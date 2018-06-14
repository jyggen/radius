<?php

/*
 * This file is part of boo/radius.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\Radius\Tests;

use Boo\Radius\Dictionary;
use Boo\Radius\Exceptions\InvalidLengthException;
use Boo\Radius\Exceptions\RadiusException;
use Boo\Radius\Packet;
use Boo\Radius\PacketEncoder;
use Boo\Radius\PacketType;
use PHPUnit\Framework\TestCase;

final class Rfc2865Test extends TestCase
{
    /**
     * @throws RadiusException
     */
    public function testSection71()
    {
        $secret = 'xyzzy5461';
        $request = "\x01\x00\x00\x38\x0f\x40\x3f\x94\x73\x97\x80\x57\xbd\x83\xd5\xcb\x98\xf4\x22\x7a\x01\x06\x6e\x65\x6d\x6f\x02\x12\x0d\xbe\x70\x8d\x93\xd4\x13\xce\x31\x96\xe4\x3f\x78\x2a\x0a\xee\x04\x06\xc0\xa8\x01\x10\x05\x06\x00\x00\x00\x03";
        $encoder = new PacketEncoder();
        $packet = $encoder->decode($request, $secret);

        $this->assertSame(PacketType::ACCESS_REQUEST(), $packet->getType());
        $this->assertSame(0, $packet->getIdentifier());
        $this->assertCount(4, $packet->getAttributes());
        $this->assertSame('nemo', $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_USER_NAME));
        $this->assertSame('arctangent', $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_USER_PASSWORD));
        $this->assertSame('192.168.1.16', $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_NAS_IP_ADDRESS));
        $this->assertSame(3, $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_NAS_PORT));
        $this->assertSame($request, $encoder->encode($packet));

        $response = "\x02\x00\x00\x26\x86\xfe\x22\x0e\x76\x24\xba\x2a\x10\x05\xf6\xbf\x9b\x55\xe0\xb2\x06\x06\x00\x00\x00\x01\x0f\x06\x00\x00\x00\x00\x0e\x06\xc0\xa8\x01\x03";
        $packet = new Packet(PacketType::ACCESS_ACCEPT(), $secret, [
            Dictionary\Rfc2865::ATTRIBUTE_SERVICE_TYPE => Dictionary\Rfc2865::VALUE_SERVICE_TYPE_LOGIN_USER,
            Dictionary\Rfc2865::ATTRIBUTE_LOGIN_SERVICE => Dictionary\Rfc2865::VALUE_LOGIN_SERVICE_TELNET,
            Dictionary\Rfc2865::ATTRIBUTE_LOGIN_IP_HOST => '192.168.1.3',
        ], $packet->getAuthenticator(), $packet->getIdentifier());

        $this->assertSame($response, $encoder->encode($packet));
        $this->assertTrue(\Boo\Radius\is_authentic_response($request, $response, $secret));
    }

    /**
     * @throws RadiusException
     */
    public function testSection72()
    {
        $secret = 'xyzzy5461';
        $encoder = new PacketEncoder();
        $request = "\x01\x01\x00\x47\x2a\xee\x86\xf0\x8d\x0d\x55\x96\x9c\xa5\x97\x8e\x0d\x33\x67\xa2\x01\x08\x66\x6c\x6f\x70\x73\x79\x03\x13\x16\xe9\x75\x57\xc3\x16\x18\x58\x95\xf2\x93\xff\x63\x44\x07\x72\x75\x04\x06\xc0\xa8\x01\x10\x05\x06\x00\x00\x00\x14\x06\x06\x00\x00\x00\x02\x07\x06\x00\x00\x00\x01";
        $packet = $encoder->decode($request, $secret);

        $this->assertSame(PacketType::ACCESS_REQUEST(), $packet->getType());
        $this->assertSame(1, $packet->getIdentifier());
        $this->assertCount(6, $packet->getAttributes());
        $this->assertSame('flopsy', $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_USER_NAME));
        $this->assertSame('192.168.1.16', $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_NAS_IP_ADDRESS));
        $this->assertSame(20, $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_NAS_PORT));
        $this->assertSame(Dictionary\Rfc2865::VALUE_SERVICE_TYPE_FRAMED_USER, $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_SERVICE_TYPE));
        $this->assertSame(Dictionary\Rfc2865::VALUE_FRAMED_PROTOCOL_PPP, $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_FRAMED_PROTOCOL));
        $this->assertSame($request, $encoder->encode($packet));

        $response = "\x02\x01\x00\x38\xe8\x6f\xa2\xfe\x28\x70\x33\xad\x2f\x6d\x5c\xa3\xf7\x41\x5d\xa2\x06\x06\x00\x00\x00\x02\x07\x06\x00\x00\x00\x01\x08\x06\xff\xff\xff\xfe\x0a\x06\x00\x00\x00\x00\x0d\x06\x00\x00\x00\x01\x0c\x06\x00\x00\x05\xdc";
        $packet = new Packet(PacketType::ACCESS_ACCEPT(), $secret, [
            Dictionary\Rfc2865::ATTRIBUTE_SERVICE_TYPE => Dictionary\Rfc2865::VALUE_SERVICE_TYPE_FRAMED_USER,
            Dictionary\Rfc2865::ATTRIBUTE_FRAMED_PROTOCOL => Dictionary\Rfc2865::VALUE_FRAMED_PROTOCOL_PPP,
            Dictionary\Rfc2865::ATTRIBUTE_FRAMED_IP_ADDRESS => '255.255.255.254',
            Dictionary\Rfc2865::ATTRIBUTE_FRAMED_ROUTING => Dictionary\Rfc2865::VALUE_FRAMED_ROUTING_NONE,
            Dictionary\Rfc2865::ATTRIBUTE_FRAMED_COMPRESSION => Dictionary\Rfc2865::VALUE_FRAMED_COMPRESSION_VAN_JACOBSON_TCP_IP,
            Dictionary\Rfc2865::ATTRIBUTE_FRAMED_MTU => 1500,
        ], $packet->getAuthenticator(), $packet->getIdentifier());

        $this->assertSame($response, $encoder->encode($packet));
        $this->assertTrue(\Boo\Radius\is_authentic_response($request, $response, $secret));
    }

    /**
     * @throws RadiusException
     */
    public function testSection73()
    {
        $secret = 'xyzzy5461';
        $encoder = new PacketEncoder();
        $request = "\x01\x02\x00\x39\xf3\xa4\x7a\x1f\x6a\x6d\x76\x71\x0b\x94\x7a\xb9\x30\x41\xa0\x39\x01\x07\x6d\x6f\x70\x73\x79\x02\x12\x33\x65\x75\x73\x77\x82\x89\xb5\x70\x88\x5e\x15\x08\x48\x25\xc5\x04\x06\xc0\xa8\x01\x10\x05\x06\x00\x00\x00\x07";
        $packet = $encoder->decode($request, $secret);

        $this->assertSame(PacketType::ACCESS_REQUEST(), $packet->getType());
        $this->assertSame(2, $packet->getIdentifier());
        $this->assertCount(4, $packet->getAttributes());
        $this->assertSame('mopsy', $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_USER_NAME));
        $this->assertSame('challenge', $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_USER_PASSWORD));
        $this->assertSame('192.168.1.16', $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_NAS_IP_ADDRESS));
        $this->assertSame(7, $packet->findOneAttributeByType(Dictionary\Rfc2865::ATTRIBUTE_NAS_PORT));
        $this->assertSame($request, $encoder->encode($packet));

        $response = "\x0b\x02\x00\x4e\x36\xf3\xc8\x76\x4a\xe8\xc7\x11\x57\x40\x3c\x0c\x71\xff\x9c\x45\x12\x30\x43\x68\x61\x6c\x6c\x65\x6e\x67\x65\x20\x33\x32\x37\x36\x39\x34\x33\x30\x2e\x20\x20\x45\x6e\x74\x65\x72\x20\x72\x65\x73\x70\x6f\x6e\x73\x65\x20\x61\x74\x20\x70\x72\x6f\x6d\x70\x74\x2e\x18\x0a\x33\x32\x37\x36\x39\x34\x33\x30";
        $packet = new Packet(PacketType::ACCESS_CHALLENGE(), $secret, [
            Dictionary\Rfc2865::ATTRIBUTE_REPLY_MESSAGE => 'Challenge 32769430.  Enter response at prompt.',
            Dictionary\Rfc2865::ATTRIBUTE_STATE => "\x33\x32\x37\x36\x39\x34\x33\x30",
        ], $packet->getAuthenticator(), $packet->getIdentifier());

        $this->assertSame($response, $encoder->encode($packet));
        $this->assertTrue(\Boo\Radius\is_authentic_response($request, $response, $secret));

        $request = "\x01\x03\x00\x43\xb1\x22\x55\x6d\x42\x8a\x13\xd0\xd6\x25\x38\x07\xc4\x57\xec\xf0\x01\x07\x6d\x6f\x70\x73\x79\x02\x12\x69\x2c\x1f\x20\x5f\xc0\x81\xb9\x19\xb9\x51\x95\xf5\x61\xa5\x81\x04\x06\xc0\xa8\x01\x10\x05\x06\x00\x00\x00\x07\x18\x10\x33\x32\x37\x36\x39\x34\x33\x30";
        $response = "\x03\x03\x00\x14\xa4\x2f\x4f\xca\x45\x91\x6c\x4e\x09\xc8\x34\x0f\x9e\x74\x6a\xa0";
        $packet = new Packet(PacketType::ACCESS_REJECT(), $secret, [], "\xb1\x22\x55\x6d\x42\x8a\x13\xd0\xd6\x25\x38\x07\xc4\x57\xec\xf0", 3);

        $this->assertSame($response, $encoder->encode($packet));
        $this->assertTrue(\Boo\Radius\is_authentic_response($request, $response, $secret));
    }

    /**
     * @throws RadiusException
     */
    public function testSection73InvalidAttributeLengthPacket()
    {
        $this->setExpectedException(InvalidLengthException::class);

        $secret = 'xyzzy5461';
        $encoder = new PacketEncoder();
        $request = "\x01\x03\x00\x43\xb1\x22\x55\x6d\x42\x8a\x13\xd0\xd6\x25\x38\x07\xc4\x57\xec\xf0\x01\x07\x6d\x6f\x70\x73\x79\x02\x12\x69\x2c\x1f\x20\x5f\xc0\x81\xb9\x19\xb9\x51\x95\xf5\x61\xa5\x81\x04\x06\xc0\xa8\x01\x10\x05\x06\x00\x00\x00\x07\x18\x10\x33\x32\x37\x36\x39\x34\x33\x30";

        $encoder->decode($request, $secret);
    }
}
