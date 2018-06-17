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

use Boo\Radius\Exceptions\AttributeException;

final class PacketEncoder
{
    const DECODE_FORMAT = 'Ccode/Cidentifier/nlength/a16authenticator/a*attributes';
    const ENCODE_FORMAT = 'CCna16a*';
    const MAX_PACKET_LENGTH = 4096;

    /**
     * @var AttributeEncoder
     */
    private $attributes;

    public function __construct(AttributeEncoder $attributeEncoder = null)
    {
        if ($attributeEncoder === null) {
            $attributeEncoder = new AttributeEncoder();
        }

        $this->attributes = $attributeEncoder;
    }

    /**
     * @param string $message
     * @param string $secret
     *
     * @throws AttributeException
     *
     * @return Packet
     */
    public function decode($message, $secret)
    {
        if (strlen($message) < 20) {
            // @todo: throw exception
            die('packet not at least 20 bytes long');
        }

        $parts = unpack(self::DECODE_FORMAT, $message);

        if ($parts['length'] < 20 ||
            $parts['length'] > self::MAX_PACKET_LENGTH ||
            strlen($message) !== $parts['length']) {
            // @todo: throw exception
            die('invalid packet length');
        }

        try {
            $code = PacketType::byValue($parts['code']);
        } catch (\Exception $e) {
            // @todo: throw exception
            die('code');
        }

        $packet = new Packet(
            $code,
            $secret,
            $this->attributes->decode($parts['attributes'], $parts['authenticator'], $secret),
            $parts['authenticator'],
            $parts['identifier']
        );

        return $packet;
    }

    /**
     * @param Packet $packet
     *
     * @return string
     */
    public function encode(Packet $packet)
    {
        $attributes = $this->attributes->encode($packet);
        $length = 20 + strlen($attributes);

        if ($length > self::MAX_PACKET_LENGTH) {
            die('encoded packet is too long');
        }

        $authenticator = str_repeat("\x00", 16);
        $packetCode = $packet->getType()->getValue();

        switch ($packetCode) {
            case PacketType::ACCESS_REQUEST:
                $authenticator = $packet->getAuthenticator();
                break;
            case PacketType::ACCESS_ACCEPT:
            case PacketType::ACCESS_REJECT:
            case PacketType::ACCOUNTING_REQUEST:
            case PacketType::ACCOUNTING_RESPONSE:
            case PacketType::ACCESS_CHALLENGE:
            case PacketType::DISCONNECT_REQUEST:
            case PacketType::DISCONNECT_ACK:
            case PacketType::DISCONNECT_NAK:
            case PacketType::COA_REQUEST:
            case PacketType::COA_ACK:
            case PacketType::COA_NAK:
                if (in_array($packetCode, [
                    PacketType::ACCOUNTING_REQUEST,
                    PacketType::DISCONNECT_REQUEST,
                    PacketType::COA_REQUEST,
                ], true) === false) {
                    $authenticator = $packet->getAuthenticator();
                }

                $message = $this->encodePacket($packet, $length, $authenticator, $attributes);
                $authenticator = md5($message.$packet->getSecret(), true);
                break;
            default:
                die('unknown packet code');
        }

        return $this->encodePacket($packet, $length, $authenticator, $attributes);
    }

    /**
     * @param Packet $packet
     * @param int    $length
     * @param string $authenticator
     * @param string $attributes
     *
     * @return string
     */
    private function encodePacket(Packet $packet, $length, $authenticator, $attributes)
    {
        return pack(
            self::ENCODE_FORMAT,
            $packet->getType()->getValue(),
            $packet->getIdentifier(),
            $length,
            $authenticator,
            $attributes
        );
    }
}
