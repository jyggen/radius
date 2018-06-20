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

use Boo\Radius\Attributes\StringAttribute;
use Boo\Radius\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @covers \Boo\Radius\Attributes\StringAttribute
 */
final class StringAttributeTest extends TestCase
{
    /**
     * @throws InvalidArgumentException
     */
    public function testEncodeDecode()
    {
        $foobar = 'foobar';
        $decoded = StringAttribute::decode(StringAttribute::encode($foobar, $foobar, $foobar), $foobar, $foobar);

        $this->assertSame($foobar, $decoded);
    }
}
