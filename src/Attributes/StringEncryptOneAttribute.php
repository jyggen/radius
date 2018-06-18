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

final class StringEncryptOneAttribute implements AttributeInterface
{
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public static function decode($value, $authenticator, $secret, array $options = null)
    {
        $valueLength = strlen($value);

        if ($valueLength < 16 || $valueLength > 128) {
            die('invalid length');
        }

        if ($secret === '') {
            die('invalid secret');
        }

        if ($authenticator === '') {
            die('invalid authenticator');
        }

        $password = md5($secret.$authenticator, true);
        $parts = str_split($value, 16);

        foreach (str_split($parts[0], 1) as $i => $character) {
            $password[$i] = $password[$i] ^ $character;
        }

        for ($i = 1; $i * 16 < $valueLength; ++$i) {
            $password .= md5($secret.$parts[$i - 1], true);

            foreach (str_split($parts[$i], 1) as $j => $character) {
                $offset = $i * 16 + $j;
                $password[$offset] = $password[$offset] ^ $character;
            }
        }

        return rtrim($password, "\x00");
    }

    /**
     * {@inheritdoc}
     *
     * @param string $value
     */
    public static function encode($value, $authenticator, $secret, array $options = null)
    {
        $password = $value;

        while (strlen($password) % 16 !== 0) {
            $password .= "\x00";
        }

        $passwordLength = strlen($password);

        if ($passwordLength > 128) {
            die('invalid length');
        }

        if ($secret === '') {
            die('invalid secret');
        }

        if (strlen($authenticator) !== 16) {
            die('invalid authenticator');
        }

        $value = md5($secret.$authenticator, true);
        $parts = str_split($password, 16);

        foreach (str_split($parts[0], 1) as $i => $character) {
            $value[$i] = $value[$i] ^ $character;
        }

        for ($i = 1; $i * 16 < $passwordLength; ++$i) {
            $value .= md5($secret.$parts[$i - 1], true);

            foreach (str_split($parts[$i], 1) as $j => $character) {
                $offset = $i * 16 + $j;
                $value[$offset] = $value[$offset] ^ $character;
            }
        }

        return $value;
    }
}
