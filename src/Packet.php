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

use Boo\Radius\Attributes\AttributeInterface;

final class Packet
{
    /**
     * @var AttributeInterface[]
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
     * @param AttributeInterface[] $attributes
     * @param null|string          $authenticator
     * @param null|string          $identifier
     */
    public function __construct(PacketType $type, $secret, array $attributes = [], $authenticator = null, $identifier = null)
    {
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
        $this->attributes = array_map(function (AttributeInterface $attribute) {
            return $attribute;
        }, $attributes);
    }

    /**
     * @param int $type
     *
     * @return AttributeInterface|null
     */
    public function findOneAttributeByType($type)
    {
        foreach ($this->attributes as $attribute) {
            if ($attribute->getType() === $type) {
                return $attribute;
            }
        }

        return null;
    }

    /**
     * @return AttributeInterface[]
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
}
