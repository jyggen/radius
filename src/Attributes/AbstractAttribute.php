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

abstract class AbstractAttribute implements AttributeInterface
{
    /**
     * @var string
     */
    private $value;

    /**
     * {@inheritdoc}
     */
    final public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public static function decode($message, $authenticator, $secret)
    {
        return new static($message);
    }

    /**
     * {@inheritdoc}
     */
    public function encode($authenticator, $secret)
    {
        return $this->getValue();
    }

    /**
     * {@inheritdoc}
     */
    abstract public function getType();

    /**
     * {@inheritdoc}
     */
    final public function getValue()
    {
        return $this->value;
    }
}
