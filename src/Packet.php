<?php

/*
 * This file is part of boo/radius.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\Radius;

final class Packet
{
    /**
     * @var array<string, mixed[]>
     */
    private $attributes;

    /**
     * @var string
     */
    private $authenticator;

    /**
     * @var int
     */
    private $identifier;

    /**
     * @var string
     */
    private $secret;

    /**
     * @var PacketType
     */
    private $type;

    /**
     * @param PacketType           $type
     * @param string               $secret
     * @param array<string, mixed> $attributes
     * @param null|string          $authenticator
     * @param null|string          $identifier
     */
    public function __construct(
        PacketType $type,
        $secret,
        array $attributes,
        $authenticator = null,
        $identifier = null
    ) {
        if ($authenticator === null) {
            $authenticator = random_bytes(16);
        }

        if ($identifier === null) {
            $identifier = random_int(0, 255);
        }

        $this->authenticator = $authenticator;
        $this->identifier = $identifier;
        $this->secret = $secret;
        $this->type = $type;
        $this->attributes = array_map(function ($attribute) {
            return (array) $attribute;
        }, $attributes);
    }

    /**
     * @param string $attribute
     *
     * @return array
     */
    public function getAttribute($attribute)
    {
        if (array_key_exists($attribute, $this->attributes) === false) {
            die('not found');
        }

        return $this->attributes[$attribute];
    }

    /**
     * @param string $attribute
     *
     * @return string
     */
    public function getAttributeString($attribute)
    {
        if (array_key_exists($attribute, $this->attributes) === false) {
            die('not found');
        }

        return implode(', ', $this->attributes[$attribute]);
    }

    /**
     * @return array<string, mixed[]>
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return string
     */
    public function getAuthenticator()
    {
        return $this->authenticator;
    }

    /**
     * @return int
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @return PacketType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $attribute
     *
     * @return mixed
     */
    public function getUniqueAttribute($attribute)
    {
        if (array_key_exists($attribute, $this->attributes) === false) {
            die('not found');
        }

        if (count($this->attributes[$attribute]) > 1) {
            die('too many');
        }

        return $this->attributes[$attribute][0];
    }
}
