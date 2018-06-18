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
    const ACCT_STATUS_TYPE_START = 1;
    const ACCT_STATUS_TYPE_STOP = 2;
    const ACCT_STATUS_TYPE_ALIVE = 3;
    const ACCT_STATUS_TYPE_INTERIM_UPDATE = 3;
    const ACCT_STATUS_TYPE_ACCOUNTING_ON = 7;
    const ACCT_STATUS_TYPE_ACCOUNTING_OFF = 8;
    const ACCT_STATUS_TYPE_FAILED = 15;
    const ACCT_AUTHENTIC_RADIUS = 1;
    const ACCT_AUTHENTIC_LOCAL = 2;
    const ACCT_AUTHENTIC_REMOTE = 3;
    const ACCT_AUTHENTIC_DIAMETER = 4;
    const ACCT_TERMINATE_CAUSE_USER_REQUEST = 1;
    const ACCT_TERMINATE_CAUSE_LOST_CARRIER = 2;
    const ACCT_TERMINATE_CAUSE_LOST_SERVICE = 3;
    const ACCT_TERMINATE_CAUSE_IDLE_TIMEOUT = 4;
    const ACCT_TERMINATE_CAUSE_SESSION_TIMEOUT = 5;
    const ACCT_TERMINATE_CAUSE_ADMIN_RESET = 6;
    const ACCT_TERMINATE_CAUSE_ADMIN_REBOOT = 7;
    const ACCT_TERMINATE_CAUSE_PORT_ERROR = 8;
    const ACCT_TERMINATE_CAUSE_NAS_ERROR = 9;
    const ACCT_TERMINATE_CAUSE_NAS_REQUEST = 10;
    const ACCT_TERMINATE_CAUSE_NAS_REBOOT = 11;
    const ACCT_TERMINATE_CAUSE_PORT_UNNEEDED = 12;
    const ACCT_TERMINATE_CAUSE_PORT_PREEMPTED = 13;
    const ACCT_TERMINATE_CAUSE_PORT_SUSPENDED = 14;
    const ACCT_TERMINATE_CAUSE_SERVICE_UNAVAILABLE = 15;
    const ACCT_TERMINATE_CAUSE_CALLBACK = 16;
    const ACCT_TERMINATE_CAUSE_USER_ERROR = 17;
    const ACCT_TERMINATE_CAUSE_HOST_REQUEST = 18;

    /**
     * @var array[]
     */
    private static $attributes = [
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Acct-Status-Type',
            'type' => 40,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Acct-Delay-Time',
            'type' => 41,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Acct-Input-Octets',
            'type' => 42,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Acct-Output-Octets',
            'type' => 43,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Acct-Session-Id',
            'type' => 44,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Acct-Authentic',
            'type' => 45,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Acct-Session-Time',
            'type' => 46,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Acct-Input-Packets',
            'type' => 47,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Acct-Output-Packets',
            'type' => 48,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Acct-Terminate-Cause',
            'type' => 49,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Acct-Multi-Session-Id',
            'type' => 50,
            'vendor' => null,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Acct-Link-Count',
            'type' => 51,
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
