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

final class Rfc2867 implements DictionaryInterface
{
    const ATTRIBUTE_ACCT_TUNNEL_CONNECTION = 68;
    const ATTRIBUTE_ACCT_TUNNEL_PACKETS_LOST = 86;

    const VALUE_ACCT_STATUS_TYPE_TUNNEL_START = 9;
    const VALUE_ACCT_STATUS_TYPE_TUNNEL_STOP = 10;
    const VALUE_ACCT_STATUS_TYPE_TUNNEL_REJECT = 11;
    const VALUE_ACCT_STATUS_TYPE_TUNNEL_LINK_START = 12;
    const VALUE_ACCT_STATUS_TYPE_TUNNEL_LINK_STOP = 13;
    const VALUE_ACCT_STATUS_TYPE_TUNNEL_LINK_REJECT = 14;

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return [
            self::ATTRIBUTE_ACCT_TUNNEL_CONNECTION => [
                'has_tag' => false,
                'name' => 'Acct-Tunnel-Connection',
                'type' => Attributes\StringAttribute::class,
            ],
            self::ATTRIBUTE_ACCT_TUNNEL_PACKETS_LOST => [
                'has_tag' => false,
                'name' => 'Acct-Tunnel-Packets-Lost',
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
