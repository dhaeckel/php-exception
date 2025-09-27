<?php

declare(strict_types=1);

namespace Haeckel\Exc\Test\Util;

use Haeckel\Exc\Util\MsgProvider;
use PHPUnit\Framework\{
    Attributes\CoversClass,
    Attributes\Small,
    TestCase,
};

#[Small]
#[CoversClass(MsgProvider::class)]
final class MessageProviderTest extends TestCase
{
    public function testCreateTypeErrMsg(): void
    {
        $this->assertEquals(
            'Argument #2 ($foo) must be of type int, string given',
            MsgProvider::createTypeErrMsg(2, 'int', 'string', '$foo'),
        );

        $this->assertEquals(
            'Argument #3 must be of type int, string given',
            MsgProvider::createTypeErrMsg(3, 'int', 'string'),
        );
    }
}
