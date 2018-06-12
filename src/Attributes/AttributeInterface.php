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

interface AttributeInterface
{
    /**
     * @param string $value
     */
    public function __construct($value);

    /**
     * @param string $message
     * @param string $authenticator
     * @param string $secret
     */
    public static function decode($message, $authenticator, $secret);

    /**
     * @param string $authenticator
     * @param string $secret
     *
     * @return string
     */
    public function encode($authenticator, $secret);

    /**
     * @return int
     */
    public function getType();

    /**
     * @return string
     */
    public function getValue();
}
