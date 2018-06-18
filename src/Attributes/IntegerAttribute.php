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

final class IntegerAttribute implements AttributeInterface
{
    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public static function decode($message, $authenticator, $secret, array $options = null)
    {
        return array_sum(unpack('N', $message));
    }

    /**
     * {@inheritdoc}
     *
     * @param int $value
     */
    public static function encode($value, $authenticator, $secret, array $options = null)
    {
        return pack('N', $value);
    }
}
