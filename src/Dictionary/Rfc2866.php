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

final class Rfc2866 implements DictionaryInterface
{
    const ATTRIBUTE_ACCT_STATUS_TYPE = 40;
    const ATTRIBUTE_ACCT_DELAY_TIME = 41;
    const ATTRIBUTE_ACCT_INPUT_OCTETS = 42;
    const ATTRIBUTE_ACCT_OUTPUT_OCTETS = 43;
    const ATTRIBUTE_ACCT_SESSION_ID = 44;
    const ATTRIBUTE_ACCT_AUTHENTIC = 45;
    const ATTRIBUTE_ACCT_SESSION_TIME = 46;
    const ATTRIBUTE_ACCT_INPUT_PACKETS = 47;
    const ATTRIBUTE_ACCT_OUTPUT_PACKETS = 48;
    const ATTRIBUTE_ACCT_TERMINATE_CAUSE = 49;
    const ATTRIBUTE_ACCT_MULTI_SESSION_ID = 50;
    const ATTRIBUTE_ACCT_LINK_COUNT = 51;

    const VALUE_ACCT_STATUS_TYPE_START = 1;
    const VALUE_ACCT_STATUS_TYPE_STOP = 2;
    const VALUE_ACCT_STATUS_TYPE_ALIVE = 3; // dup
    const VALUE_ACCT_STATUS_TYPE_INTERIM_UPDATE = 3;
    const VALUE_ACCT_STATUS_TYPE_ACCOUNTING_ON = 7;
    const VALUE_ACCT_STATUS_TYPE_ACCOUNTING_OFF = 8;
    const VALUE_ACCT_STATUS_TYPE_FAILED = 15;
    const VALUE_ACCT_AUTHENTIC_RADIUS = 1;
    const VALUE_ACCT_AUTHENTIC_LOCAL = 2;
    const VALUE_ACCT_AUTHENTIC_REMOTE = 3;
    const VALUE_ACCT_AUTHENTIC_DIAMETER = 4;
    const VALUE_ACCT_TERMINATE_CAUSE_USER_REQUEST = 1;
    const VALUE_ACCT_TERMINATE_CAUSE_LOST_CARRIER = 2;
    const VALUE_ACCT_TERMINATE_CAUSE_LOST_SERVICE = 3;
    const VALUE_ACCT_TERMINATE_CAUSE_IDLE_TIMEOUT = 4;
    const VALUE_ACCT_TERMINATE_CAUSE_SESSION_TIMEOUT = 5;
    const VALUE_ACCT_TERMINATE_CAUSE_ADMIN_RESET = 6;
    const VALUE_ACCT_TERMINATE_CAUSE_ADMIN_REBOOT = 7;
    const VALUE_ACCT_TERMINATE_CAUSE_PORT_ERROR = 8;
    const VALUE_ACCT_TERMINATE_CAUSE_NAS_ERROR = 9;
    const VALUE_ACCT_TERMINATE_CAUSE_NAS_REQUEST = 10;
    const VALUE_ACCT_TERMINATE_CAUSE_NAS_REBOOT = 11;
    const VALUE_ACCT_TERMINATE_CAUSE_PORT_UNNEEDED = 12;
    const VALUE_ACCT_TERMINATE_CAUSE_PORT_PREEMPTED = 13;
    const VALUE_ACCT_TERMINATE_CAUSE_PORT_SUSPENDED = 14;
    const VALUE_ACCT_TERMINATE_CAUSE_SERVICE_UNAVAILABLE = 15;
    const VALUE_ACCT_TERMINATE_CAUSE_CALLBACK = 16;
    const VALUE_ACCT_TERMINATE_CAUSE_USER_ERROR = 17;
    const VALUE_ACCT_TERMINATE_CAUSE_HOST_REQUEST = 18;

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return [
            self::ATTRIBUTE_ACCT_STATUS_TYPE => [
                'has_tag' => false,
                'name' => 'Acct-Status-Type',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_DELAY_TIME => [
                'has_tag' => false,
                'name' => 'Acct-Delay-Time',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_INPUT_OCTETS => [
                'has_tag' => false,
                'name' => 'Acct-Input-Octets',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_OUTPUT_OCTETS => [
                'has_tag' => false,
                'name' => 'Acct-Output-Octets',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_SESSION_ID => [
                'has_tag' => false,
                'name' => 'Acct-Session-Id',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_AUTHENTIC => [
                'has_tag' => false,
                'name' => 'Acct-Authentic',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_SESSION_TIME => [
                'has_tag' => false,
                'name' => 'Acct-Session-Time',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_INPUT_PACKETS => [
                'has_tag' => false,
                'name' => 'Acct-Input-Packets',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_OUTPUT_PACKETS => [
                'has_tag' => false,
                'name' => 'Acct-Output-Packets',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_TERMINATE_CAUSE => [
                'has_tag' => false,
                'name' => 'Acct-Terminate-Cause',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_MULTI_SESSION_ID => [
                'has_tag' => false,
                'name' => 'Acct-Multi-Session-Id',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_LINK_COUNT => [
                'has_tag' => false,
                'name' => 'Acct-Link-Count',
                'type' => Attributes\IntegerAttribute::class,
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
