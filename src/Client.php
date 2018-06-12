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

use Socket\Raw\Factory;
use Socket\Raw\Socket;

final class Client
{
    /**
     * @var PacketEncoder
     */
    private $encoder;

    /**
     * @var Socket
     */
    private $socket;

    /**
     * @param string             $address
     * @param null|float         $timeout
     * @param null|PacketEncoder $encoder
     */
    public function __construct($address, $timeout = null, PacketEncoder $encoder = null)
    {
        if ($encoder === null) {
            $encoder = new PacketEncoder();
        }

        $this->encoder = $encoder;
        $this->socket = (new Factory())->createClient($address, $timeout);
    }

    public function __destruct()
    {
        $this->socket->shutdown()->close();
    }

    /**
     * @param Packet $packet
     *
     * @throws Exceptions\AttributeException
     *
     * @return Packet
     */
    public function send(Packet $packet)
    {
        $request = $this->encoder->encode($packet);

        $this->socket->write($request);

        $response = $this->socket->read(PacketEncoder::MAX_PACKET_LENGTH);

        if (is_authentic_response($request, $response, $packet->getSecret()) === false) {
            die('unauthentic response');
        }

        return $this->encoder->decode($response, $packet->getSecret());
    }
}
