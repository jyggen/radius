<?php

/*
 * This file is part of boo/radius.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\Radius\Dictionary;

use Boo\Radius\Attributes;
use Boo\Radius\DictionaryInterface;

final class Rfc3162 implements DictionaryInterface
{
    /**
     * @var array[]
     */
    private static $attributes = [
        [
            'encoder' => [
                'class' => Attributes\IpAddressAttribute::class,
                'options' => [
                    0 => 2097152,
                ],
            ],
            'has_tag' => false,
            'name' => 'NAS-IPv6-Address',
            'type' => 95,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-Interface-Id',
            'type' => 96,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-IPv6-Prefix',
            'type' => 97,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IpAddressAttribute::class,
                'options' => [
                    0 => 2097152,
                ],
            ],
            'has_tag' => false,
            'name' => 'Login-IPv6-Host',
            'type' => 98,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-IPv6-Route',
            'type' => 99,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-IPv6-Pool',
            'type' => 100,
            'vendor' => null,
        ],
    ];

    /**
     * @var array[]
     */
    private static $vendors = [
    ];

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return self::$attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function getVendors()
    {
        return self::$vendors;
    }
}
