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

use Boo\Radius\Attributes\LoginIpHostAttribute;
use Boo\Radius\Attributes\LoginServiceAttribute;
use Boo\Radius\Attributes\NasIpAddressAttribute;
use Boo\Radius\Attributes\NasPortAttribute;
use Boo\Radius\Attributes\ServiceTypeAttribute;
use Boo\Radius\Attributes\UserNameAttribute;
use Boo\Radius\Attributes\UserPasswordAttribute;
use Boo\Radius\Exceptions\AttributeException;
use Boo\Radius\Packet;
use Boo\Radius\PacketEncoder;
use Boo\Radius\PacketType;
use PHPUnit\Framework\TestCase;

final class Rfc2865Test extends TestCase
{
    /**
     * @throws AttributeException
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
        $this->assertSame('nemo', $packet->findOneAttributeByType(UserNameAttribute::TYPE)->getValue());
        $this->assertSame('arctangent', $packet->findOneAttributeByType(UserPasswordAttribute::TYPE)->getValue());
        $this->assertSame('192.168.1.16', $packet->findOneAttributeByType(NasIpAddressAttribute::TYPE)->getValue());
        $this->assertSame(3, $packet->findOneAttributeByType(NasPortAttribute::TYPE)->getValue());
        $this->assertSame($request, $encoder->encode($packet));

        $response = "\x02\x00\x00\x26\x86\xfe\x22\x0e\x76\x24\xba\x2a\x10\x05\xf6\xbf\x9b\x55\xe0\xb2\x06\x06\x00\x00\x00\x01\x0f\x06\x00\x00\x00\x00\x0e\x06\xc0\xa8\x01\x03";
        $packet = new Packet(PacketType::ACCESS_ACCEPT(), $secret, [
            new ServiceTypeAttribute(1),
            new LoginServiceAttribute(0),
            new LoginIpHostAttribute('192.168.1.3'),
        ], $packet->getAuthenticator(), $packet->getIdentifier());

        $this->assertSame($response, $encoder->encode($packet));
        $this->assertTrue(\Boo\Radius\is_authentic_response($request, $response, $secret));
    }
}
