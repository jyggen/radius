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

use Boo\Radius\Attributes\DateAttribute;
use Boo\Radius\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @covers \Boo\Radius\Attributes\DateAttribute
 */
final class DateAttributeTest extends TestCase
{
    /**
     * @throws \Exception
     * @throws InvalidArgumentException
     */
    public function testEncodeDecode()
    {
        $foobar = 'foobar';
        $date = new \DateTimeImmutable();
        $decoded = DateAttribute::decode(DateAttribute::encode($date, $foobar, $foobar), $foobar, $foobar);

        $this->assertSame($date->getTimestamp(), $decoded->getTimestamp());
    }

    /**
     * @throws \Exception
     * @throws InvalidArgumentException
     */
    public function testEncodeInvalidArgument()
    {
        $this->setExpectedException(InvalidArgumentException::class);

        $foobar = 'foobar';

        DateAttribute::encode($foobar, $foobar, $foobar);
    }
}
