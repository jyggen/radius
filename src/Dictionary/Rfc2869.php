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
    const ATTRIBUTE_ACCT_INPUT_GIGAWORDS = 52;
    const ATTRIBUTE_ACCT_OUTPUT_GIGAWORDS = 53;
    const ATTRIBUTE_EVENT_TIMESTAMP = 55;
    const ATTRIBUTE_ARAP_PASSWORD = 70;
    const ATTRIBUTE_ARAP_FEATURES = 71;
    const ATTRIBUTE_ARAP_ZONE_ACCESS = 72;
    const ATTRIBUTE_ARAP_SECURITY = 73;
    const ATTRIBUTE_ARAP_SECURITY_DATA = 74;
    const ATTRIBUTE_PASSWORD_RETRY = 75;
    const ATTRIBUTE_PROMPT = 76;
    const ATTRIBUTE_CONNECT_INFO = 77;
    const ATTRIBUTE_CONFIGURATION_TOKEN = 78;
    const ATTRIBUTE_EAP_MESSAGE = 79;
    const ATTRIBUTE_MESSAGE_AUTHENTICATOR = 80;
    const ATTRIBUTE_ARAP_CHALLENGE_RESPONSE = 84;
    const ATTRIBUTE_ACCT_INTERIM_INTERVAL = 85;
    const ATTRIBUTE_NAS_PORT_ID = 87;
    const ATTRIBUTE_FRAMED_POOL = 88;

    const VALUE_ARAP_ZONE_ACCESS_DEFAULT_ZONE = 1;
    const VALUE_ARAP_ZONE_ACCESS_ZONE_FILTER_INCLUSIVE = 2;
    const VALUE_ARAP_ZONE_ACCESS_ZONE_FILTER_EXCLUSIVE = 4;
    const VALUE_PROMPT_NO_ECHO = 0;
    const VALUE_PROMPT_ECHO = 1;

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return [
            self::ATTRIBUTE_ACCT_INPUT_GIGAWORDS => [
                'has_tag' => false,
                'name' => 'Acct-Input-Gigawords',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_OUTPUT_GIGAWORDS => [
                'has_tag' => false,
                'name' => 'Acct-Output-Gigawords',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_EVENT_TIMESTAMP => [
                'has_tag' => false,
                'name' => 'Event-Timestamp',
                'type' => Attributes\DateAttribute::class,
            ],
            self::ATTRIBUTE_ARAP_PASSWORD => [
                'has_tag' => false,
                'name' => 'ARAP-Password',
                'type' => Attributes\OctetsAttribute::class,
            ],
            self::ATTRIBUTE_ARAP_FEATURES => [
                'has_tag' => false,
                'name' => 'ARAP-Features',
                'type' => Attributes\OctetsAttribute::class,
            ],
            self::ATTRIBUTE_ARAP_ZONE_ACCESS => [
                'has_tag' => false,
                'name' => 'ARAP-Zone-Access',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_ARAP_SECURITY => [
                'has_tag' => false,
                'name' => 'ARAP-Security',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_ARAP_SECURITY_DATA => [
                'has_tag' => false,
                'name' => 'ARAP-Security-Data',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_PASSWORD_RETRY => [
                'has_tag' => false,
                'name' => 'Password-Retry',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_PROMPT => [
                'has_tag' => false,
                'name' => 'Prompt',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_CONNECT_INFO => [
                'has_tag' => false,
                'name' => 'Connect-Info',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_CONFIGURATION_TOKEN => [
                'has_tag' => false,
                'name' => 'Configuration-Token',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_EAP_MESSAGE => [
                'has_tag' => false,
                'name' => 'EAP-Message',
                'type' => Attributes\OctetsAttribute::class,
            ],
            self::ATTRIBUTE_MESSAGE_AUTHENTICATOR => [
                'has_tag' => false,
                'name' => 'Message-Authenticator',
                'type' => Attributes\OctetsAttribute::class,
            ],
            self::ATTRIBUTE_ARAP_CHALLENGE_RESPONSE => [
                'has_tag' => false,
                'name' => 'ARAP-Challenge-Response',
                'type' => Attributes\OctetsAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_INTERIM_INTERVAL => [
                'has_tag' => false,
                'name' => 'Acct-Interim-Interval',
                'type' => Attributes\IntegerAttribute::class,
            ],
            self::ATTRIBUTE_NAS_PORT_ID => [
                'has_tag' => false,
                'name' => 'NAS-Port-Id',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_FRAMED_POOL => [
                'has_tag' => false,
                'name' => 'Framed-Pool',
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
