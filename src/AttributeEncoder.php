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

final class AttributeEncoder
{
    const DECODE_FORMAT = 'Ctype/Clength/a*packet';
    const DECODE_VENDOR_FORMAT = 'Nvendor/Ctype/Clength/a*packet';
    const ENCODE_FORMAT = 'CCa*';
    const ENCODE_VENDOR_FORMAT = 'NCCa*';
    const VENDOR_SPECIFIC_TYPE = 26;

    /**
     * @var AttributeFactory
     */
    private $factory;

    public function __construct(AttributeFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param string $message
     * @param string $authenticator
     * @param string $secret
     *
     * @throws AttributeException
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
                // @todo: throw exception
                die('attribute length');
            }

            if ($parts['type'] !== self::VENDOR_SPECIFIC_TYPE) {
                $attributes[] = $this->factory->createAttributeFromType(
                    $parts['type'],
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

            $attributes[] = $this->factory->createVendorSpecificFromType(
                $vendorParts['vendor'],
                $vendorParts['type'],
                $vendorParts['packet'],
                $authenticator,
                $secret
            );
        }

        return $attributes;
    }

    /**
     * @param AttributeInterface $attribute
     * @param string             $authenticator
     * @param string             $secret
     *
     * @return string
     */
    public function encode(AttributeInterface $attribute, $authenticator, $secret)
    {
        $encoded = $attribute->encode($authenticator, $secret);
        $length = strlen($encoded) + 2;

        return pack(self::ENCODE_FORMAT, $attribute->getType(), $length, $encoded);
    }
}
