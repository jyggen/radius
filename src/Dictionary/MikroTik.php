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
    const ATTRIBUTE_MIKROTIK_RECV_LIMIT = 1;
    const ATTRIBUTE_MIKROTIK_XMIT_LIMIT = 2;
    const ATTRIBUTE_MIKROTIK_GROUP = 3;
    const ATTRIBUTE_MIKROTIK_WIRELESS_FORWARD = 4;
    const ATTRIBUTE_MIKROTIK_WIRELESS_SKIP_DOT1X = 5;
    const ATTRIBUTE_MIKROTIK_WIRELESS_ENC_ALGO = 6;
    const ATTRIBUTE_MIKROTIK_WIRELESS_ENC_KEY = 7;
    const ATTRIBUTE_MIKROTIK_RATE_LIMIT = 8;
    const ATTRIBUTE_MIKROTIK_REALM = 9;
    const ATTRIBUTE_MIKROTIK_HOST_IP = 10;
    const ATTRIBUTE_MIKROTIK_MARK_ID = 11;
    const ATTRIBUTE_MIKROTIK_ADVERTISE_URL = 12;
    const ATTRIBUTE_MIKROTIK_ADVERTISE_INTERVAL = 13;
    const ATTRIBUTE_MIKROTIK_RECV_LIMIT_GIGAWORDS = 14;
    const ATTRIBUTE_MIKROTIK_XMIT_LIMIT_GIGAWORDS = 15;
    const ATTRIBUTE_MIKROTIK_WIRELESS_PSK = 16;
    const ATTRIBUTE_MIKROTIK_TOTAL_LIMIT = 17;
    const ATTRIBUTE_MIKROTIK_TOTAL_LIMIT_GIGAWORDS = 18;
    const ATTRIBUTE_MIKROTIK_ADDRESS_LIST = 19;
    const ATTRIBUTE_MIKROTIK_WIRELESS_MPKEY = 20;
    const ATTRIBUTE_MIKROTIK_WIRELESS_COMMENT = 21;
    const ATTRIBUTE_MIKROTIK_DELEGATED_IPV6_POOL = 22;
    const ATTRIBUTE_MIKROTIK_DHCP_OPTION_SET = 23;
    const ATTRIBUTE_MIKROTIK_DHCP_OPTION_PARAM_STR1 = 24;
    const ATTRIBUTE_MIKORTIK_DHCP_OPTION_PARAMSTR2 = 25;
    const ATTRIBUTE_MIKROTIK_WIRELESS_VLANID = 26;
    const ATTRIBUTE_MIKROTIK_WIRELESS_VLANID_TYPE = 27;
    const ATTRIBUTE_MIKROTIK_WIRELESS_MINSIGNAL = 28;
    const ATTRIBUTE_MIKROTIK_WIRELESS_MAXSIGNAL = 29;

    const VALUE_MIKROTIK_WIRELESS_ENC_ALGO_NO_ENCRYPTION = 0;
    const VALUE_MIKROTIK_WIRELESS_ENC_ALGO_40_BIT_WEP = 1;
    const VALUE_MIKROTIK_WIRELESS_ENC_ALGO_104_BIT_WEP = 2;
    const VALUE_MIKROTIK_WIRELESS_ENC_ALGO_AES_CCM = 3;
    const VALUE_MIKROTIK_WIRELESS_ENC_ALGO_TKIP = 4;

    const VENDOR_MIKROTIK = 14988;

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return [
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getVendorAttributes()
    {
        return [
            self::VENDOR_MIKROTIK => [
                self::ATTRIBUTE_MIKROTIK_RECV_LIMIT => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Recv-Limit',
                    'type' => Attributes\IntegerAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_XMIT_LIMIT => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Xmit-Limit',
                    'type' => Attributes\IntegerAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_GROUP => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Group',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_WIRELESS_FORWARD => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Wireless-Forward',
                    'type' => Attributes\IntegerAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_WIRELESS_SKIP_DOT1X => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Wireless-Skip-Dot1x',
                    'type' => Attributes\IntegerAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_WIRELESS_ENC_ALGO => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Wireless-Enc-Algo',
                    'type' => Attributes\IntegerAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_WIRELESS_ENC_KEY => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Wireless-Enc-Key',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_RATE_LIMIT => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Rate-Limit',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_REALM => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Realm',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_HOST_IP => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Host-IP',
                    'type' => Attributes\IpAddressAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_MARK_ID => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Mark-Id',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_ADVERTISE_URL => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Advertise-URL',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_ADVERTISE_INTERVAL => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Advertise-Interval',
                    'type' => Attributes\IntegerAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_RECV_LIMIT_GIGAWORDS => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Recv-Limit-Gigawords',
                    'type' => Attributes\IntegerAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_XMIT_LIMIT_GIGAWORDS => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Xmit-Limit-Gigawords',
                    'type' => Attributes\IntegerAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_WIRELESS_PSK => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Wireless-PSK',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_TOTAL_LIMIT => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Total-Limit',
                    'type' => Attributes\IntegerAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_TOTAL_LIMIT_GIGAWORDS => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Total-Limit-Gigawords',
                    'type' => Attributes\IntegerAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_ADDRESS_LIST => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Address-List',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_WIRELESS_MPKEY => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Wireless-MPKey',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_WIRELESS_COMMENT => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Wireless-Comment',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_DELEGATED_IPV6_POOL => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Delegated-IPv6-Pool',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_DHCP_OPTION_SET => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-DHCP-Option-Set',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_DHCP_OPTION_PARAM_STR1 => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-DHCP-Option-Param-STR1',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKORTIK_DHCP_OPTION_PARAMSTR2 => [
                    'has_tag' => false,
                    'name' => 'Mikortik-DHCP-Option-ParamSTR2',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_WIRELESS_VLANID => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Wireless-VLANID',
                    'type' => Attributes\IntegerAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_WIRELESS_VLANID_TYPE => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Wireless-VLANID-Type',
                    'type' => Attributes\IntegerAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_WIRELESS_MINSIGNAL => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Wireless-Minsignal',
                    'type' => Attributes\StringAttribute::class,
                ],
                self::ATTRIBUTE_MIKROTIK_WIRELESS_MAXSIGNAL => [
                    'has_tag' => false,
                    'name' => 'Mikrotik-Wireless-Maxsignal',
                    'type' => Attributes\StringAttribute::class,
                ],
            ],
        ];
    }
}
