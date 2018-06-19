<?php

/*
 * This file is part of boo/radius.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\Radius;

use Boo\Radius\Attributes\AttributeInterface;
use Boo\Radius\Exceptions\AttributeException;
use Boo\Radius\Exceptions\InvalidLengthException;

final class AttributeEncoder
{
    const DECODE_FORMAT = 'Ctype/Clength/a*packet';
    const DECODE_VENDOR_FORMAT = 'Nvendor/Ctype/Clength/a*packet';
    const ENCODE_FORMAT = 'CCa*';
    const ENCODE_VENDOR_FORMAT = 'NCCa*';
    const VENDOR_SPECIFIC_ATTRIBUTE = 26;

    /**
     * @var array[]
     */
    private $attributes = [];

    /**
     * @var array<string, array>
     */
    private $attributeNameLookup = [];

    /**
     * @var array<int, array>
     */
    private $attributeTypeLookup = [];

    /**
     * @var array<int, array>
     */
    private $vendors = [];

    /**
     * @var array<int, array>
     */
    private $vendorTypeLookup = [];

    public function __construct()
    {
        $this->registerDictionary(new Dictionary\Rfc2865());
        $this->registerDictionary(new Dictionary\Rfc2866());
        $this->registerDictionary(new Dictionary\Rfc2867());
        $this->registerDictionary(new Dictionary\Rfc2868());
        $this->registerDictionary(new Dictionary\Rfc2869());
        $this->registerDictionary(new Dictionary\Rfc3162());
        $this->registerDictionary(new Dictionary\Rfc3576());
        $this->registerDictionary(new Dictionary\Rfc3580());
        $this->registerDictionary(new Dictionary\Rfc4072());
        $this->registerDictionary(new Dictionary\Rfc4372());
        $this->registerDictionary(new Dictionary\Rfc4603());
        $this->registerDictionary(new Dictionary\Rfc4675());
        $this->registerDictionary(new Dictionary\Rfc4679());
        $this->registerDictionary(new Dictionary\Rfc4818());
        $this->registerDictionary(new Dictionary\Rfc4849());
        $this->registerDictionary(new Dictionary\Rfc5090());
        $this->registerDictionary(new Dictionary\Rfc5176());
    }

    /**
     * @param string $message
     * @param string $authenticator
     * @param string $secret
     *
     * @throws InvalidLengthException
     *
     * @return array<string, mixed[]>
     */
    public function decode($message, $authenticator, $secret)
    {
        $attributes = [];

        while (strlen($message) > 0) {
            $parts = unpack(self::DECODE_FORMAT, $message);
            $length = $parts['length'] - 2;
            $message = substr($parts['packet'], $length);
            $parts['packet'] = substr($parts['packet'], 0, $length);

            if (strlen($parts['packet']) !== $length) {
                throw new InvalidLengthException('Attribute length does not match actual length');
            }

            if (self::VENDOR_SPECIFIC_ATTRIBUTE === $parts['type']) {
                $attributes = array_merge(
                    $attributes,
                    $this->decodeVendorSpecific($authenticator, $secret, $parts['packet'])
                );

                continue;
            }

            $attribute = $this->getAttributeFromType($parts['type']);
            /** @var AttributeInterface $encoder */
            $encoder = $attribute['encoder']['class'];
            $decoded = $encoder::decode(
                $parts['packet'],
                $authenticator,
                $secret,
                $attribute['encoder']['options']
            );

            if (false === array_key_exists($attribute['name'], $attributes)) {
                $attributes[$attribute['name']] = [];
            }

            $attributes[$attribute['name']][] = $decoded;
        }

        return $attributes;
    }

    /**
     * @param Packet $packet
     *
     * @return string
     */
    public function encode(Packet $packet)
    {
        $message = '';
        $authenticator = $packet->getAuthenticator();
        $secret = $packet->getSecret();

        foreach ($packet->getAttributes() as $name => $values) {
            $attribute = $this->getAttributeFromName($name);

            if (null !== $attribute['vendor']) {
                $values = $this->encodeVendorSpecific($packet, $attribute, $values);
                $attribute = $this->getAttributeFromType(self::VENDOR_SPECIFIC_ATTRIBUTE);
            }

            foreach ($values as $value) {
                /** @var AttributeInterface $encoder */
                $encoder = $attribute['encoder']['class'];
                $encoded = $encoder::encode($value, $authenticator, $secret, $attribute['encoder']['options']);
                $length = strlen($encoded) + 2;
                $message .= pack(self::ENCODE_FORMAT, $attribute['type'], $length, $encoded);
            }
        }

        return $message;
    }

    /**
     * @param DictionaryInterface $dictionary
     */
    public function registerDictionary(DictionaryInterface $dictionary)
    {
        // @todo validate dictionary somehow?

        foreach ($dictionary->getVendors() as $vendor) {
            $this->vendors[$vendor['identifier']] = $vendor;
            $this->vendorTypeLookup[$vendor['identifier']] = [];
        }

        foreach ($dictionary->getAttributes() as $attribute) {
            $this->attributes[] = $attribute;

            end($this->attributes);

            $key = key($this->attributes);
            $this->attributeNameLookup[$attribute['name']] = &$this->attributes[$key];

            if (null === $attribute['vendor']) {
                $this->attributeTypeLookup[$attribute['type']] = &$this->attributes[$key];

                continue;
            }

            $this->vendorTypeLookup[$attribute['vendor']][$attribute['type']] = &$this->attributes[$key];
        }

        foreach ($dictionary->getVendors() as $vendor) {
            $this->vendors[$vendor['identifier']] = $vendor;
        }
    }

    /**
     * @param string $authenticator
     * @param string $secret
     * @param string $message
     *
     * @throws InvalidLengthException
     *
     * @return array<string, mixed[]>
     */
    private function decodeVendorSpecific($authenticator, $secret, $message)
    {
        $attributes = [];

        while (strlen($message) > 0) {
            $parts = unpack(self::DECODE_VENDOR_FORMAT, $message);
            $length = $parts['length'] - 2;
            $message = substr($parts['packet'], $length);
            $parts['packet'] = substr($parts['packet'], 0, $length);

            if (strlen($parts['packet']) !== $length) {
                throw new InvalidLengthException('Attribute length does not match actual length');
            }

            $attribute = $this->getVendorAttributeFromType($parts['vendor'], $parts['type']);
            /** @var AttributeInterface $encoder */
            $encoder = $attribute['encoder']['class'];
            $decoded = $encoder::decode($parts['packet'], $authenticator, $secret, $attribute['encoder']['options']);

            if (false === array_key_exists($attribute['name'], $attributes)) {
                $attributes[$attribute['name']] = [];
            }

            $attributes[$attribute['name']][] = $decoded;
        }

        return $attributes;
    }

    /**
     * @param Packet               $packet
     * @param array<string, mixed> $attribute
     * @param mixed[]              $values
     *
     * @return string[]
     */
    private function encodeVendorSpecific(Packet $packet, array $attribute, array $values)
    {
        $authenticator = $packet->getAuthenticator();
        $secret = $packet->getSecret();

        foreach ($values as $key => $value) {
            /** @var AttributeInterface $encoder */
            $encoder = $attribute['encoder']['class'];
            $encoded = $encoder::encode($value, $authenticator, $secret, $attribute['encoder']['options']);
            $length = strlen($encoded) + 2;
            $values[$key] = pack(
                self::ENCODE_VENDOR_FORMAT,
                $attribute['vendor'],
                $attribute['type'],
                $length,
                $encoded
            );
        }

        return $values;
    }

    /**
     * @param string $name
     *
     * @throws AttributeException
     *
     * @return array<string, mixed>
     */
    private function getAttributeFromName($name)
    {
        if (false === array_key_exists($name, $this->attributeNameLookup)) {
            throw new AttributeException('Attribute with name "'.$name.'" not found within the loaded dictionaries');
        }

        return $this->attributeNameLookup[$name];
    }

    /**
     * @param int $type
     *
     * @throws AttributeException
     *
     * @return array<string, mixed>
     */
    private function getAttributeFromType($type)
    {
        if (false === array_key_exists($type, $this->attributeTypeLookup)) {
            throw new AttributeException('Attribute with code "'.$type.'" not found within the loaded dictionaries');
        }

        return $this->attributeTypeLookup[$type];
    }

    /**
     * @param int $vendor
     * @param int $type
     *
     * @throws AttributeException
     *
     * @return array<string, mixed>
     */
    private function getVendorAttributeFromType($vendor, $type)
    {
        if (false === array_key_exists($vendor, $this->vendorTypeLookup)) {
            throw new AttributeException('Vendor with code "'.$type.'" not found within the loaded dictionaries');
        }

        if (false === array_key_exists($type, $this->vendorTypeLookup[$vendor])) {
            throw new AttributeException('Attribute with type "'.$type.'" for vendor "'.$this->vendors[$vendor]['name'].'" not found within the loaded dictionaries');
        }

        return $this->vendorTypeLookup[$vendor][$type];
    }
}
