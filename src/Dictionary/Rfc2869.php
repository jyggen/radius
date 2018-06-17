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

final class Rfc2869 implements DictionaryInterface
{
    const ARAP_ZONE_ACCESS_DEFAULT_ZONE = 1;
    const ARAP_ZONE_ACCESS_ZONE_FILTER_INCLUSIVE = 2;
    const ARAP_ZONE_ACCESS_ZONE_FILTER_EXCLUSIVE = 4;
    const PROMPT_NO_ECHO = 0;
    const PROMPT_ECHO = 1;

    /**
     * @var array[]
     */
    private static $attributes = [
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Acct-Input-Gigawords',
            'type' => 52,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Acct-Output-Gigawords',
            'type' => 53,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\DateAttribute::class,
            'has_tag' => false,
            'name' => 'Event-Timestamp',
            'type' => 55,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\OctetsAttribute::class,
            'has_tag' => false,
            'name' => 'ARAP-Password',
            'type' => 70,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\OctetsAttribute::class,
            'has_tag' => false,
            'name' => 'ARAP-Features',
            'type' => 71,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'ARAP-Zone-Access',
            'type' => 72,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'ARAP-Security',
            'type' => 73,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'ARAP-Security-Data',
            'type' => 74,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Password-Retry',
            'type' => 75,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Prompt',
            'type' => 76,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Connect-Info',
            'type' => 77,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Configuration-Token',
            'type' => 78,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\OctetsAttribute::class,
            'has_tag' => false,
            'name' => 'EAP-Message',
            'type' => 79,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\OctetsAttribute::class,
            'has_tag' => false,
            'name' => 'Message-Authenticator',
            'type' => 80,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\OctetsAttribute::class,
            'has_tag' => false,
            'name' => 'ARAP-Challenge-Response',
            'type' => 84,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\IntegerAttribute::class,
            'has_tag' => false,
            'name' => 'Acct-Interim-Interval',
            'type' => 85,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'NAS-Port-Id',
            'type' => 87,
            'vendor' => null,
        ],
        [
            'encoder' => Attributes\StringAttribute::class,
            'has_tag' => false,
            'name' => 'Framed-Pool',
            'type' => 88,
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
