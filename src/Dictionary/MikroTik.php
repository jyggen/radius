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

final class MikroTik implements DictionaryInterface
{
    const MIKROTIK_WIRELESS_ENC_ALGO_NO_ENCRYPTION = 0;
    const MIKROTIK_WIRELESS_ENC_ALGO_40_BIT_WEP = 1;
    const MIKROTIK_WIRELESS_ENC_ALGO_104_BIT_WEP = 2;
    const MIKROTIK_WIRELESS_ENC_ALGO_AES_CCM = 3;
    const MIKROTIK_WIRELESS_ENC_ALGO_TKIP = 4;

    /**
     * @var array[]
     */
    private static $attributes = [
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Recv-Limit',
            'type' => 1,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Xmit-Limit',
            'type' => 2,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Group',
            'type' => 3,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Wireless-Forward',
            'type' => 4,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Wireless-Skip-Dot1x',
            'type' => 5,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Wireless-Enc-Algo',
            'type' => 6,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Wireless-Enc-Key',
            'type' => 7,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Rate-Limit',
            'type' => 8,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Realm',
            'type' => 9,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\IpAddressAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Host-IP',
            'type' => 10,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Mark-Id',
            'type' => 11,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Advertise-URL',
            'type' => 12,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Advertise-Interval',
            'type' => 13,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Recv-Limit-Gigawords',
            'type' => 14,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Xmit-Limit-Gigawords',
            'type' => 15,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Wireless-PSK',
            'type' => 16,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Total-Limit',
            'type' => 17,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Total-Limit-Gigawords',
            'type' => 18,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Address-List',
            'type' => 19,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Wireless-MPKey',
            'type' => 20,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Wireless-Comment',
            'type' => 21,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Delegated-IPv6-Pool',
            'type' => 22,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-DHCP-Option-Set',
            'type' => 23,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-DHCP-Option-Param-STR1',
            'type' => 24,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikortik-DHCP-Option-ParamSTR2',
            'type' => 25,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Wireless-VLANID',
            'type' => 26,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Wireless-VLANID-Type',
            'type' => 27,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Wireless-Minsignal',
            'type' => 28,
            'vendor' => 14988,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Mikrotik-Wireless-Maxsignal',
            'type' => 29,
            'vendor' => 14988,
        ],
    ];

    /**
     * @var array[]
     */
    private static $vendors = [
        [
           'identifier' => 14988,
           'name' => 'Mikrotik',
        ],
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
