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

use Boo\Radius\Exceptions\InvalidArgumentException;

final class DateAttribute implements AttributeInterface
{
    /**
     * {@inheritdoc}
     *
     * @return \DateTimeImmutable
     */
    public static function decode($message, $authenticator, $secret, array $options = null)
    {
        $timestamp = array_sum(unpack('N', $message));

        return \DateTimeImmutable::createFromFormat('U', $timestamp);
    }

    /**
     * {@inheritdoc}
     *
     * @param \DateTimeInterface $value
     */
    public static function encode($value, $authenticator, $secret, array $options = null)
    {
        if ($value instanceof \DateTimeImmutable === false) {
            throw new InvalidArgumentException('Value must implement interface DateTimeInterface');
        }

        return pack('N', $value->getTimestamp());
    }
}
