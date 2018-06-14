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
    const ATTRIBUTE_USER_NAME = 1;
    const ATTRIBUTE_USER_PASSWORD = 2;
    const ATTRIBUTE_CHAP_PASSWORD = 3;
    const ATTRIBUTE_NAS_IP_ADDRESS = 4;
    const ATTRIBUTE_NAS_PORT = 5;
    const ATTRIBUTE_SERVICE_TYPE = 6;
    const ATTRIBUTE_FRAMED_PROTOCOL = 7;
    const ATTRIBUTE_FRAMED_IP_ADDRESS = 8;
    const ATTRIBUTE_FRAMED_IP_NETMASK = 9;
    const ATTRIBUTE_FRAMED_ROUTING = 10;
    const ATTRIBUTE_FILTER_ID = 11;
    const ATTRIBUTE_FRAMED_MTU = 12;
    const ATTRIBUTE_FRAMED_COMPRESSION = 13;
    const ATTRIBUTE_LOGIN_IP_HOST = 14;
    const ATTRIBUTE_LOGIN_SERVICE = 15;
    const ATTRIBUTE_LOGIN_TCP_PORT = 16;
    const ATTRIBUTE_REPLY_MESSAGE = 18;
    const ATTRIBUTE_CALLBACK_NUMBER = 19;
    const ATTRIBUTE_CALLBACK_ID = 20;
    const ATTRIBUTE_FRAMED_ROUTE = 22;
    const ATTRIBUTE_FRAMED_IPX_NETWORK = 23;
    const ATTRIBUTE_STATE = 24;
    const ATTRIBUTE_CLASS = 25;
    const ATTRIBUTE_SESSION_TIMEOUT = 27;
    const ATTRIBUTE_IDLE_TIMEOUT = 28;
    const ATTRIBUTE_TERMINATION_ACTION = 29;
    const ATTRIBUTE_CALLED_STATION_ID = 30;
    const ATTRIBUTE_CALLING_STATION_ID = 31;
    const ATTRIBUTE_NAS_IDENTIFIER = 32;
    const ATTRIBUTE_PROXY_STATE = 33;
    const ATTRIBUTE_LOGIN_LAT_SERVICE = 34;
    const ATTRIBUTE_LOGIN_LAT_NODE = 35;
    const ATTRIBUTE_LOGIN_LAT_GROUP = 36;
    const ATTRIBUTE_FRAMED_APPLETALK_LINK = 37;
    const ATTRIBUTE_FRAMED_APPLETALK_NETWORK = 38;
    const ATTRIBUTE_FRAMED_APPLETALK_ZONE = 39;
    const ATTRIBUTE_CHAP_CHALLENGE = 60;
    const ATTRIBUTE_NAS_PORT_TYPE = 61;
    const ATTRIBUTE_PORT_LIMIT = 62;
    const ATTRIBUTE_LOGIN_LAT_PORT = 63;

    const VALUE_SERVICE_TYPE_LOGIN_USER = 1;
    const VALUE_SERVICE_TYPE_FRAMED_USER = 2;
    const VALUE_SERVICE_TYPE_CALLBACK_LOGIN_USER = 3;
    const VALUE_SERVICE_TYPE_CALLBACK_FRAMED_USER = 4;
    const VALUE_SERVICE_TYPE_OUTBOUND_USER = 5;
    const VALUE_SERVICE_TYPE_ADMINISTRATIVE_USER = 6;
    const VALUE_SERVICE_TYPE_NAS_PROMPT_USER = 7;
    const VALUE_SERVICE_TYPE_AUTHENTICATE_ONLY = 8;
    const VALUE_SERVICE_TYPE_CALLBACK_NAS_PROMPT = 9;
    const VALUE_SERVICE_TYPE_CALL_CHECK = 10;
    const VALUE_SERVICE_TYPE_CALLBACK_ADMINISTRATIVE = 11;
    const VALUE_FRAMED_PROTOCOL_PPP = 1;
    const VALUE_FRAMED_PROTOCOL_SLIP = 2;
    const VALUE_FRAMED_PROTOCOL_ARAP = 3;
    const VALUE_FRAMED_PROTOCOL_GANDALF_SLML = 4;
    const VALUE_FRAMED_PROTOCOL_XYLOGICS_IPX_SLIP = 5;
    const VALUE_FRAMED_PROTOCOL_X_75_SYNCHRONOUS = 6;
    const VALUE_FRAMED_ROUTING_NONE = 0;
    const VALUE_FRAMED_ROUTING_BROADCAST = 1;
    const VALUE_FRAMED_ROUTING_LISTEN = 2;
    const VALUE_FRAMED_ROUTING_BROADCAST_LISTEN = 3;
    const VALUE_FRAMED_COMPRESSION_NONE = 0;
    const VALUE_FRAMED_COMPRESSION_VAN_JACOBSON_TCP_IP = 1;
    const VALUE_FRAMED_COMPRESSION_IPX_HEADER_COMPRESSION = 2;
    const VALUE_FRAMED_COMPRESSION_STAC_LZS = 3;
    const VALUE_LOGIN_SERVICE_TELNET = 0;
    const VALUE_LOGIN_SERVICE_RLOGIN = 1;
    const VALUE_LOGIN_SERVICE_TCP_CLEAR = 2;
    const VALUE_LOGIN_SERVICE_PORTMASTER = 3;
    const VALUE_LOGIN_SERVICE_LAT = 4;
    const VALUE_LOGIN_SERVICE_X25_PAD = 5;
    const VALUE_LOGIN_SERVICE_X25_T3POS = 6;
    const VALUE_LOGIN_SERVICE_TCP_CLEAR_QUIET = 8;
    const VALUE_LOGIN_TCP_PORT_TELNET = 23;
    const VALUE_LOGIN_TCP_PORT_RLOGIN = 513;
    const VALUE_LOGIN_TCP_PORT_RSH = 514;
    const VALUE_TERMINATION_ACTION_DEFAULT = 0;
    const VALUE_TERMINATION_ACTION_RADIUS_REQUEST = 1;
    const VALUE_NAS_PORT_TYPE_ASYNC = 0;
    const VALUE_NAS_PORT_TYPE_SYNC = 1;
    const VALUE_NAS_PORT_TYPE_ISDN = 2;
    const VALUE_NAS_PORT_TYPE_ISDN_V120 = 3;
    const VALUE_NAS_PORT_TYPE_ISDN_V110 = 4;
    const VALUE_NAS_PORT_TYPE_VIRTUAL = 5;
    const VALUE_NAS_PORT_TYPE_PIAFS = 6;
    const VALUE_NAS_PORT_TYPE_HDLC_CLEAR_CHANNEL = 7;
    const VALUE_NAS_PORT_TYPE_X_25 = 8;
    const VALUE_NAS_PORT_TYPE_X_75 = 9;
    const VALUE_NAS_PORT_TYPE_G_3_FAX = 10;
    const VALUE_NAS_PORT_TYPE_SDSL = 11;
    const VALUE_NAS_PORT_TYPE_ADSL_CAP = 12;
    const VALUE_NAS_PORT_TYPE_ADSL_DMT = 13;
    const VALUE_NAS_PORT_TYPE_IDSL = 14;
    const VALUE_NAS_PORT_TYPE_ETHERNET = 15;
    const VALUE_NAS_PORT_TYPE_XDSL = 16;
    const VALUE_NAS_PORT_TYPE_CABLE = 17;
    const VALUE_NAS_PORT_TYPE_WIRELESS_OTHER = 18;
    const VALUE_NAS_PORT_TYPE_WIRELESS_802_11 = 19;

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return [
            self::ATTRIBUTE_USER_NAME => [
                'has_tag' => false,
                'name' => 'User-Name',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_USER_PASSWORD => [
                'has_tag' => false,
                'name' => 'User-Password',
                'type' => Attributes\StringEncryptOneAttribute::class,
            ],
            self::ATTRIBUTE_CHAP_PASSWORD => [
                'has_tag' => false,
                'name' => 'CHAP-Password',
                'type' => Attributes\OctetsAttribute::class,
            ],
            self::ATTRIBUTE_NAS_IP_ADDRESS => [
                'has_tag' => false,
                'name' => 'NAS-IP-Address',
                'type' => Attributes\IpAddressAttribute::class,
            ],
            self::ATTRIBUTE_NAS_PORT => [
                'has_tag' => false,
                'name' => 'NAS-Port',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_SERVICE_TYPE => [
                'has_tag' => false,
                'name' => 'Service-Type',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_FRAMED_PROTOCOL => [
                'has_tag' => false,
                'name' => 'Framed-Protocol',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_FRAMED_IP_ADDRESS => [
                'has_tag' => false,
                'name' => 'Framed-IP-Address',
                'type' => Attributes\IpAddressAttribute::class,
            ],
            self::ATTRIBUTE_FRAMED_IP_NETMASK => [
                'has_tag' => false,
                'name' => 'Framed-IP-Netmask',
                'type' => Attributes\IpAddressAttribute::class,
            ],
            self::ATTRIBUTE_FRAMED_ROUTING => [
                'has_tag' => false,
                'name' => 'Framed-Routing',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_FILTER_ID => [
                'has_tag' => false,
                'name' => 'Filter-Id',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_FRAMED_MTU => [
                'has_tag' => false,
                'name' => 'Framed-MTU',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_FRAMED_COMPRESSION => [
                'has_tag' => false,
                'name' => 'Framed-Compression',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_LOGIN_IP_HOST => [
                'has_tag' => false,
                'name' => 'Login-IP-Host',
                'type' => Attributes\IpAddressAttribute::class,
            ],
            self::ATTRIBUTE_LOGIN_SERVICE => [
                'has_tag' => false,
                'name' => 'Login-Service',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_LOGIN_TCP_PORT => [
                'has_tag' => false,
                'name' => 'Login-TCP-Port',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_REPLY_MESSAGE => [
                'has_tag' => false,
                'name' => 'Reply-Message',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_CALLBACK_NUMBER => [
                'has_tag' => false,
                'name' => 'Callback-Number',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_CALLBACK_ID => [
                'has_tag' => false,
                'name' => 'Callback-Id',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_FRAMED_ROUTE => [
                'has_tag' => false,
                'name' => 'Framed-Route',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_FRAMED_IPX_NETWORK => [
                'has_tag' => false,
                'name' => 'Framed-IPX-Network',
                'type' => Attributes\IpAddressAttribute::class,
            ],
            self::ATTRIBUTE_STATE => [
                'has_tag' => false,
                'name' => 'State',
                'type' => Attributes\OctetsAttribute::class,
            ],
            self::ATTRIBUTE_CLASS => [
                'has_tag' => false,
                'name' => 'Class',
                'type' => Attributes\OctetsAttribute::class,
            ],
            self::ATTRIBUTE_SESSION_TIMEOUT => [
                'has_tag' => false,
                'name' => 'Session-Timeout',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_IDLE_TIMEOUT => [
                'has_tag' => false,
                'name' => 'Idle-Timeout',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_TERMINATION_ACTION => [
                'has_tag' => false,
                'name' => 'Termination-Action',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_CALLED_STATION_ID => [
                'has_tag' => false,
                'name' => 'Called-Station-Id',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_CALLING_STATION_ID => [
                'has_tag' => false,
                'name' => 'Calling-Station-Id',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_NAS_IDENTIFIER => [
                'has_tag' => false,
                'name' => 'NAS-Identifier',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_PROXY_STATE => [
                'has_tag' => false,
                'name' => 'Proxy-State',
                'type' => Attributes\OctetsAttribute::class,
            ],
            self::ATTRIBUTE_LOGIN_LAT_SERVICE => [
                'has_tag' => false,
                'name' => 'Login-LAT-Service',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_LOGIN_LAT_NODE => [
                'has_tag' => false,
                'name' => 'Login-LAT-Node',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_LOGIN_LAT_GROUP => [
                'has_tag' => false,
                'name' => 'Login-LAT-Group',
                'type' => Attributes\OctetsAttribute::class,
            ],
            self::ATTRIBUTE_FRAMED_APPLETALK_LINK => [
                'has_tag' => false,
                'name' => 'Framed-AppleTalk-Link',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_FRAMED_APPLETALK_NETWORK => [
                'has_tag' => false,
                'name' => 'Framed-AppleTalk-Network',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_FRAMED_APPLETALK_ZONE => [
                'has_tag' => false,
                'name' => 'Framed-AppleTalk-Zone',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_CHAP_CHALLENGE => [
                'has_tag' => false,
                'name' => 'CHAP-Challenge',
                'type' => Attributes\OctetsAttribute::class,
            ],
            self::ATTRIBUTE_NAS_PORT_TYPE => [
                'has_tag' => false,
                'name' => 'NAS-Port-Type',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_PORT_LIMIT => [
                'has_tag' => false,
                'name' => 'Port-Limit',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_LOGIN_LAT_PORT => [
                'has_tag' => false,
                'name' => 'Login-LAT-Port',
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
