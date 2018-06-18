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

final class Rfc2865 implements DictionaryInterface
{
    const SERVICE_TYPE_LOGIN_USER = 1;
    const SERVICE_TYPE_FRAMED_USER = 2;
    const SERVICE_TYPE_CALLBACK_LOGIN_USER = 3;
    const SERVICE_TYPE_CALLBACK_FRAMED_USER = 4;
    const SERVICE_TYPE_OUTBOUND_USER = 5;
    const SERVICE_TYPE_ADMINISTRATIVE_USER = 6;
    const SERVICE_TYPE_NAS_PROMPT_USER = 7;
    const SERVICE_TYPE_AUTHENTICATE_ONLY = 8;
    const SERVICE_TYPE_CALLBACK_NAS_PROMPT = 9;
    const SERVICE_TYPE_CALL_CHECK = 10;
    const SERVICE_TYPE_CALLBACK_ADMINISTRATIVE = 11;
    const FRAMED_PROTOCOL_PPP = 1;
    const FRAMED_PROTOCOL_SLIP = 2;
    const FRAMED_PROTOCOL_ARAP = 3;
    const FRAMED_PROTOCOL_GANDALF_SLML = 4;
    const FRAMED_PROTOCOL_XYLOGICS_IPX_SLIP = 5;
    const FRAMED_PROTOCOL_X_75_SYNCHRONOUS = 6;
    const FRAMED_ROUTING_NONE = 0;
    const FRAMED_ROUTING_BROADCAST = 1;
    const FRAMED_ROUTING_LISTEN = 2;
    const FRAMED_ROUTING_BROADCAST_LISTEN = 3;
    const FRAMED_COMPRESSION_NONE = 0;
    const FRAMED_COMPRESSION_VAN_JACOBSON_TCP_IP = 1;
    const FRAMED_COMPRESSION_IPX_HEADER_COMPRESSION = 2;
    const FRAMED_COMPRESSION_STAC_LZS = 3;
    const LOGIN_SERVICE_TELNET = 0;
    const LOGIN_SERVICE_RLOGIN = 1;
    const LOGIN_SERVICE_TCP_CLEAR = 2;
    const LOGIN_SERVICE_PORTMASTER = 3;
    const LOGIN_SERVICE_LAT = 4;
    const LOGIN_SERVICE_X25_PAD = 5;
    const LOGIN_SERVICE_X25_T3POS = 6;
    const LOGIN_SERVICE_TCP_CLEAR_QUIET = 8;
    const LOGIN_TCP_PORT_TELNET = 23;
    const LOGIN_TCP_PORT_RLOGIN = 513;
    const LOGIN_TCP_PORT_RSH = 514;
    const TERMINATION_ACTION_DEFAULT = 0;
    const TERMINATION_ACTION_RADIUS_REQUEST = 1;
    const NAS_PORT_TYPE_ASYNC = 0;
    const NAS_PORT_TYPE_SYNC = 1;
    const NAS_PORT_TYPE_ISDN = 2;
    const NAS_PORT_TYPE_ISDN_V120 = 3;
    const NAS_PORT_TYPE_ISDN_V110 = 4;
    const NAS_PORT_TYPE_VIRTUAL = 5;
    const NAS_PORT_TYPE_PIAFS = 6;
    const NAS_PORT_TYPE_HDLC_CLEAR_CHANNEL = 7;
    const NAS_PORT_TYPE_X_25 = 8;
    const NAS_PORT_TYPE_X_75 = 9;
    const NAS_PORT_TYPE_G_3_FAX = 10;
    const NAS_PORT_TYPE_SDSL = 11;
    const NAS_PORT_TYPE_ADSL_CAP = 12;
    const NAS_PORT_TYPE_ADSL_DMT = 13;
    const NAS_PORT_TYPE_IDSL = 14;
    const NAS_PORT_TYPE_ETHERNET = 15;
    const NAS_PORT_TYPE_XDSL = 16;
    const NAS_PORT_TYPE_CABLE = 17;
    const NAS_PORT_TYPE_WIRELESS_OTHER = 18;
    const NAS_PORT_TYPE_WIRELESS_802_11 = 19;

    /**
     * @var array[]
     */
    private static $attributes = [
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'User-Name',
            'type' => 1,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringEncryptOneAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'User-Password',
            'type' => 2,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'CHAP-Password',
            'type' => 3,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IpAddressAttribute::class,
                'options' => [
                    0 => 1048576,
                ],
            ],
            'has_tag' => false,
            'name' => 'NAS-IP-Address',
            'type' => 4,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'NAS-Port',
            'type' => 5,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Service-Type',
            'type' => 6,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-Protocol',
            'type' => 7,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IpAddressAttribute::class,
                'options' => [
                    0 => 1048576,
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-IP-Address',
            'type' => 8,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IpAddressAttribute::class,
                'options' => [
                    0 => 1048576,
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-IP-Netmask',
            'type' => 9,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-Routing',
            'type' => 10,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Filter-Id',
            'type' => 11,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-MTU',
            'type' => 12,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-Compression',
            'type' => 13,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IpAddressAttribute::class,
                'options' => [
                    0 => 1048576,
                ],
            ],
            'has_tag' => false,
            'name' => 'Login-IP-Host',
            'type' => 14,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Login-Service',
            'type' => 15,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Login-TCP-Port',
            'type' => 16,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Reply-Message',
            'type' => 18,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Callback-Number',
            'type' => 19,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Callback-Id',
            'type' => 20,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-Route',
            'type' => 22,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IpAddressAttribute::class,
                'options' => [
                    0 => 1048576,
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-IPX-Network',
            'type' => 23,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'State',
            'type' => 24,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Class',
            'type' => 25,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Vendor-Specific',
            'type' => 26,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Session-Timeout',
            'type' => 27,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Idle-Timeout',
            'type' => 28,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Termination-Action',
            'type' => 29,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Called-Station-Id',
            'type' => 30,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Calling-Station-Id',
            'type' => 31,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'NAS-Identifier',
            'type' => 32,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Proxy-State',
            'type' => 33,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Login-LAT-Service',
            'type' => 34,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Login-LAT-Node',
            'type' => 35,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Login-LAT-Group',
            'type' => 36,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-AppleTalk-Link',
            'type' => 37,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-AppleTalk-Network',
            'type' => 38,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Framed-AppleTalk-Zone',
            'type' => 39,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'CHAP-Challenge',
            'type' => 60,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'NAS-Port-Type',
            'type' => 61,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Port-Limit',
            'type' => 62,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Login-LAT-Port',
            'type' => 63,
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
