<?php

/*
 * This file is part of boo/radius.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\Radius\Attributes;

final class SessionTimeoutAttribute extends AbstractAttribute
{
    const TYPE = 27;

    /**
     * {@inheritdoc}
     */
    public static function decode($value, $authenticator, $secret)
    {
        return parent::decode(array_sum(unpack('N', $value)), $authenticator, $secret);
    }

    /**
     * {@inheritdoc}
     */
    public function encode($authenticator, $secret)
    {
        return pack('N', parent::encode($authenticator, $secret));
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return self::TYPE;
    }
}
