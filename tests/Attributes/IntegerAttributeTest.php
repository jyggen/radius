<?php

/*
 * This file is part of boo/radius.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\Radius\Tests\Attributes;

use Boo\Radius\Attributes\IntegerAttribute;
use Boo\Radius\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @covers \Boo\Radius\Attributes\IntegerAttribute
 */
final class IntegerAttributeTest extends TestCase
{
    /**
     * @throws InvalidArgumentException
     */
    public function testEncodeDecode()
    {
        $foobar = 'foobar';
        $decoded = IntegerAttribute::decode(IntegerAttribute::encode(1337, $foobar, $foobar), $foobar, $foobar);

        $this->assertSame(1337, $decoded);
    }
}
