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

use MabeEnum\Enum;

/**
 * @method static PacketType ACCESS_REQUEST()
 * @method static PacketType ACCESS_ACCEPT()
 * @method static PacketType ACCESS_REJECT()
 * @method static PacketType ACCOUNTING_REQUEST()
 * @method static PacketType ACCOUNTING_RESPONSE()
 * @method static PacketType ACCESS_CHALLENGE()
 * @method static PacketType STATUS_SERVER()
 * @method static PacketType STATUS_CLIENT()
 * @method static PacketType DISCONNECT_REQUEST()
 * @method static PacketType DISCONNECT_ACK()
 * @method static PacketType DISCONNECT_NAK()
 * @method static PacketType COA_REQUEST()
 * @method static PacketType COA_ACK()
 * @method static PacketType COA_NAK()
 * @method static PacketType RESERVED()
 */
final class PacketType extends Enum
{
    const ACCESS_REQUEST = 1;
    const ACCESS_ACCEPT = 2;
    const ACCESS_REJECT = 3;
    const ACCOUNTING_REQUEST = 4;
    const ACCOUNTING_RESPONSE = 5;
    const ACCESS_CHALLENGE = 11;
    const STATUS_SERVER = 12;
    const STATUS_CLIENT = 13;
    const DISCONNECT_REQUEST = 40;
    const DISCONNECT_ACK = 41;
    const DISCONNECT_NAK = 42;
    const COA_REQUEST = 43;
    const COA_ACK = 44;
    const COA_NAK = 45;
    const RESERVED = 255;
}
