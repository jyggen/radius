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

final class AttributeFactory
{
    /**
     * @var array<int, string>
     */
    private $attributes = [
        Attributes\FramedIpAddressAttribute::TYPE => Attributes\FramedIpAddressAttribute::class,
        Attributes\NasIpAddressAttribute::TYPE => Attributes\NasIpAddressAttribute::class,
        Attributes\NasPortAttribute::TYPE => Attributes\NasPortAttribute::class,
        Attributes\SessionTimeoutAttribute::TYPE => Attributes\SessionTimeoutAttribute::class,
        Attributes\UserPasswordAttribute::TYPE => Attributes\UserPasswordAttribute::class,
        Attributes\UserNameAttribute::TYPE => Attributes\UserNameAttribute::class,
    ];

    /**
     * @var array<int, array<int, string>>
     */
    private $vendorAttributes = [];

    /**
     * @param int                $vendorId
     * @param array<int, string> $attributeMap
     */
    public function registerVendor($vendorId, array $attributeMap)
    {
        // @todo: verify attribute map
        $this->vendorAttributes[$vendorId] = $attributeMap;
    }

    /**
     * @param int    $type
     * @param string $value
     * @param string $authenticator
     * @param string $secret
     *
     * @throws AttributeException
     *
     * @return AttributeInterface
     */
    public function createAttributeFromType($type, $value, $authenticator, $secret)
    {
        if (array_key_exists($type, $this->attributes) === false) {
            throw new AttributeException(sprintf('Type %d is not supported', $type));
        }

        /** @var AttributeInterface $className */
        $className = $this->attributes[$type];

        return $className::decode($value, $authenticator, $secret);
    }

    /**
     * @param int    $vendor
     * @param int    $type
     * @param string $value
     * @param string $authenticator
     * @param string $secret
     *
     * @throws AttributeException
     *
     * @return AttributeInterface
     */
    public function createVendorSpecificFromType($vendor, $type, $value, $authenticator, $secret)
    {
        if (array_key_exists($vendor, $this->vendorAttributes) === false) {
            throw new AttributeException(sprintf('Vendor %d is not registered', $vendor));
        }

        if (array_key_exists($type, $this->vendorAttributes[$vendor]) === false) {
            // @todo: throw exception
            throw new AttributeException(sprintf('Type %d is not supported by vendor %d', $type, $vendor));
        }

        /** @var AttributeInterface $className */
        $className = $this->vendorAttributes[$vendor][$type];

        return $className::decode($value, $authenticator, $secret);
    }
}
