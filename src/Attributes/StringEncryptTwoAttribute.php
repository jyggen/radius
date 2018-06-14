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

final class StringEncryptTwoAttribute implements AttributeInterface
{
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public static function decode($value, $authenticator, $secret)
    {
        $salt = substr($value, 0, 2);
        $value = substr($value, 2);
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

        $password = md5($secret.$authenticator.$salt, true);
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

        $passwordLength = unpack('C', substr($password, 0, 2));

        return substr($password, 2, $passwordLength);
    }

    /**
     * {@inheritdoc}
     *
     * @param string $value
     */
    public static function encode($value, $authenticator, $secret)
    {
        $salt = random_bytes(2);
        $password = $value;
        $passwordLength = strlen($password);
        $password = pack('C', $passwordLength).$password;

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

        $value = md5($secret.$authenticator.$salt, true);
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

        return $salt.$value;
    }
}
