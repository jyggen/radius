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

use Boo\Radius\DictionaryInterface;

final class Rfc3580 implements DictionaryInterface
{
    const ACCT_TERMINATE_CAUSE_SUPPLICANT_RESTART = 19;
    const ACCT_TERMINATE_CAUSE_REAUTHENTICATION_FAILURE = 20;
    const ACCT_TERMINATE_CAUSE_PORT_REINIT = 21;
    const ACCT_TERMINATE_CAUSE_PORT_DISABLED = 22;
    const NAS_PORT_TYPE_TOKEN_RING = 20;
    const NAS_PORT_TYPE_FDDI = 21;
    const TUNNEL_TYPE_VLAN = 13;

    /**
     * @var array[]
     */
    private static $attributes = [
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
