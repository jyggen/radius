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
use Boo\Radius\Exceptions\InvalidLengthException;

final class AttributeEncoder
{
    const DECODE_FORMAT = 'Ctype/Clength/a*packet';
    const DECODE_VENDOR_FORMAT = 'Nvendor/Ctype/Clength/a*packet';
    const ENCODE_FORMAT = 'CCa*';
    const ENCODE_VENDOR_FORMAT = 'NCCa*';
    const VENDOR_SPECIFIC_TYPE = 26;

    /**
     * @var array<int, string>
     */
    private $attributes = [];

    /**
     * @var array<int, array<int, string>>
     */
    private $vendorAttributes = [];

    public function __construct()
    {
        $this->registerDictionary(new Dictionary\Rfc2865());
        $this->registerDictionary(new Dictionary\Rfc2866());
        $this->registerDictionary(new Dictionary\Rfc2867());
        $this->registerDictionary(new Dictionary\Rfc2868());
        $this->registerDictionary(new Dictionary\Rfc2869());
        $this->registerDictionary(new Dictionary\Rfc5176());
    }

    /**
     * @param string $message
     * @param string $authenticator
     * @param string $secret
     *
     * @throws InvalidLengthException
     *
     * @return array
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
                // @todo: should be distinguished somehow so RFC 2865 can be followed.
                throw new InvalidLengthException('Invalid attribute length');
            }

            if ($parts['type'] !== self::VENDOR_SPECIFIC_TYPE) {
                /** @var AttributeInterface $encoder */
                $encoder = $this->getAttributeFromType($parts['type']);

                if (array_key_exists($parts['type'], $attributes) === false) {
                    $attributes[$parts['type']] = [];
                }

                $attributes[$parts['type']][] = $encoder::decode(
                    $parts['packet'],
                    $authenticator,
                    $secret
                );
                continue;
            }

            $vendorParts = unpack(self::DECODE_VENDOR_FORMAT, $parts['packet']);

            if (strlen($parts['packet']) - 4 !== $vendorParts['length']) {
                // @todo: throw exception
                die('vendor attribute length');
            }

            die('vendor?');
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

        foreach ($packet->getAttributes() as $type => $values) {
            /** @var AttributeInterface $encoder */
            $encoder = $this->getAttributeFromType($type);

            foreach ($values as $value) {
                $encoded = $encoder::encode($value, $authenticator, $secret);
                $length = strlen($encoded) + 2;
                $message .= pack(self::ENCODE_FORMAT, $type, $length, $encoded);
            }
        }

        return $message;
    }

    /**
     * @param DictionaryInterface $dictionary
     */
    public function registerDictionary(DictionaryInterface $dictionary)
    {
        foreach ($dictionary->getAttributes() as $type => $class) {
            $this->attributes[$type] = $class['type'];
        }

        foreach ($dictionary->getVendorAttributes() as $vendorId => $attributes) {
            $this->vendorAttributes[$vendorId] = [];

            foreach ($attributes as $type => $class) {
                $this->vendorAttributes[$vendorId][$type] = $class['type'];
            }
        }
    }

    /**
     * @param int $type
     *
     * @return string
     */
    private function getAttributeFromType($type)
    {
        if (array_key_exists($type, $this->attributes) === false) {
            die('unknown attribute "'.$type.'"');
        }

        return $this->attributes[$type];
    }
}
