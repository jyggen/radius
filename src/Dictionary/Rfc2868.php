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

final class Rfc2868 implements DictionaryInterface
{
    const TUNNEL_TYPE_PPTP = 1;
    const TUNNEL_TYPE_L2F = 2;
    const TUNNEL_TYPE_L2TP = 3;
    const TUNNEL_TYPE_ATMP = 4;
    const TUNNEL_TYPE_VTP = 5;
    const TUNNEL_TYPE_AH = 6;
    const TUNNEL_TYPE_IP = 7;
    const TUNNEL_TYPE_MIN_IP = 8;
    const TUNNEL_TYPE_ESP = 9;
    const TUNNEL_TYPE_GRE = 10;
    const TUNNEL_TYPE_DVS = 11;
    const TUNNEL_TYPE_IP_IN_IP = 12;
    const TUNNEL_MEDIUM_TYPE_IP = 1;
    const TUNNEL_MEDIUM_TYPE_IPV4 = 1;
    const TUNNEL_MEDIUM_TYPE_IPV6 = 2;
    const TUNNEL_MEDIUM_TYPE_NSAP = 3;
    const TUNNEL_MEDIUM_TYPE_HDLC = 4;
    const TUNNEL_MEDIUM_TYPE_BBN_1822 = 5;
    const TUNNEL_MEDIUM_TYPE_IEEE_802 = 6;
    const TUNNEL_MEDIUM_TYPE_E_163 = 7;
    const TUNNEL_MEDIUM_TYPE_E_164 = 8;
    const TUNNEL_MEDIUM_TYPE_F_69 = 9;
    const TUNNEL_MEDIUM_TYPE_X_121 = 10;
    const TUNNEL_MEDIUM_TYPE_IPX = 11;
    const TUNNEL_MEDIUM_TYPE_APPLETALK = 12;
    const TUNNEL_MEDIUM_TYPE_DECNET_IV = 13;
    const TUNNEL_MEDIUM_TYPE_BANYAN_VINES = 14;
    const TUNNEL_MEDIUM_TYPE_E_164_NSAP = 15;

    /**
     * @var array[]
     */
    private static $attributes = [
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => true,
            'name' => 'Tunnel-Type',
            'type' => 64,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => true,
            'name' => 'Tunnel-Medium-Type',
            'type' => 65,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => true,
            'name' => 'Tunnel-Client-Endpoint',
            'type' => 66,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => true,
            'name' => 'Tunnel-Server-Endpoint',
            'type' => 67,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\StringEncryptTwoAttribute::class,
            'has_tag' => true,
            'name' => 'Tunnel-Password',
            'type' => 69,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => true,
            'name' => 'Tunnel-Private-Group-Id',
            'type' => 81,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => true,
            'name' => 'Tunnel-Assignment-Id',
            'type' => 82,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => true,
            'name' => 'Tunnel-Preference',
            'type' => 83,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => true,
            'name' => 'Tunnel-Client-Auth-Id',
            'type' => 90,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => true,
            'name' => 'Tunnel-Server-Auth-Id',
            'type' => 91,
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
