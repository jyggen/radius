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
    const ATTRIBUTE_TUNNEL_TYPE = 64;
    const ATTRIBUTE_TUNNEL_MEDIUM_TYPE = 65;
    const ATTRIBUTE_TUNNEL_CLIENT_ENDPOINT = 66;
    const ATTRIBUTE_TUNNEL_SERVER_ENDPOINT = 67;
    const ATTRIBUTE_TUNNEL_PASSWORD = 69;
    const ATTRIBUTE_TUNNEL_PRIVATE_GROUP_ID = 81;
    const ATTRIBUTE_TUNNEL_ASSIGNMENT_ID = 82;
    const ATTRIBUTE_TUNNEL_PREFERENCE = 83;
    const ATTRIBUTE_TUNNEL_CLIENT_AUTH_ID = 90;
    const ATTRIBUTE_TUNNEL_SERVER_AUTH_ID = 91;

    const VALUE_TUNNEL_TYPE_PPTP = 1;
    const VALUE_TUNNEL_TYPE_L2F = 2;
    const VALUE_TUNNEL_TYPE_L2TP = 3;
    const VALUE_TUNNEL_TYPE_ATMP = 4;
    const VALUE_TUNNEL_TYPE_VTP = 5;
    const VALUE_TUNNEL_TYPE_AH = 6;
    const VALUE_TUNNEL_TYPE_IP = 7;
    const VALUE_TUNNEL_TYPE_MIN_IP = 8;
    const VALUE_TUNNEL_TYPE_ESP = 9;
    const VALUE_TUNNEL_TYPE_GRE = 10;
    const VALUE_TUNNEL_TYPE_DVS = 11;
    const VALUE_TUNNEL_TYPE_IP_IN_IP = 12;
    const VALUE_TUNNEL_MEDIUM_TYPE_IP = 1;
    const VALUE_TUNNEL_MEDIUM_TYPE_IPV4 = 1;
    const VALUE_TUNNEL_MEDIUM_TYPE_IPV6 = 2;
    const VALUE_TUNNEL_MEDIUM_TYPE_NSAP = 3;
    const VALUE_TUNNEL_MEDIUM_TYPE_HDLC = 4;
    const VALUE_TUNNEL_MEDIUM_TYPE_BBN_1822 = 5;
    const VALUE_TUNNEL_MEDIUM_TYPE_IEEE_802 = 6;
    const VALUE_TUNNEL_MEDIUM_TYPE_E_163 = 7;
    const VALUE_TUNNEL_MEDIUM_TYPE_E_164 = 8;
    const VALUE_TUNNEL_MEDIUM_TYPE_F_69 = 9;
    const VALUE_TUNNEL_MEDIUM_TYPE_X_121 = 10;
    const VALUE_TUNNEL_MEDIUM_TYPE_IPX = 11;
    const VALUE_TUNNEL_MEDIUM_TYPE_APPLETALK = 12;
    const VALUE_TUNNEL_MEDIUM_TYPE_DECNET_IV = 13;
    const VALUE_TUNNEL_MEDIUM_TYPE_BANYAN_VINES = 14;
    const VALUE_TUNNEL_MEDIUM_TYPE_E_164_NSAP = 15;

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return [
            self::ATTRIBUTE_TUNNEL_TYPE => [
                'has_tag' => true,
                'name' => 'Tunnel-Type',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_TUNNEL_MEDIUM_TYPE => [
                'has_tag' => true,
                'name' => 'Tunnel-Medium-Type',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_TUNNEL_CLIENT_ENDPOINT => [
                'has_tag' => true,
                'name' => 'Tunnel-Client-Endpoint',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_TUNNEL_SERVER_ENDPOINT => [
                'has_tag' => true,
                'name' => 'Tunnel-Server-Endpoint',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_TUNNEL_PASSWORD => [
                'has_tag' => true,
                'name' => 'Tunnel-Password',
                'type' => Attributes\StringEncryptTwoAttribute::class,
            ],
            self::ATTRIBUTE_TUNNEL_PRIVATE_GROUP_ID => [
                'has_tag' => true,
                'name' => 'Tunnel-Private-Group-Id',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_TUNNEL_ASSIGNMENT_ID => [
                'has_tag' => true,
                'name' => 'Tunnel-Assignment-Id',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_TUNNEL_PREFERENCE => [
                'has_tag' => true,
                'name' => 'Tunnel-Preference',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_TUNNEL_CLIENT_AUTH_ID => [
                'has_tag' => true,
                'name' => 'Tunnel-Client-Auth-Id',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_TUNNEL_SERVER_AUTH_ID => [
                'has_tag' => true,
                'name' => 'Tunnel-Server-Auth-Id',
                'type' => Attributes\StringAttribute::class,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getVendorAttributes()
    {
        return [
        ];
    }
}
