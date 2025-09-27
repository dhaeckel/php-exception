<?php

declare(strict_types=1);

namespace Haeckel\Exc\Test\LogCtxAware;

use Haeckel\Exc\LogCtxAware;
use PHPUnit\Framework\{Attributes\CoversTrait, Attributes\Small, TestCase};

#[Small]
#[CoversTrait(LogCtxAware\CtxAwareExceptionTrait::class)]
final class CtxAwareTraitTest extends TestCase
{
    public function testConstruction(): void
    {
        $ex = new LogCtxAware\CtxAwareException(context: ['foo' => 'bar']);
        $this->assertInstanceOf(\Exception::class, $ex);
        $this->assertEquals(['foo' => 'bar'], $ex->getContext());
    }

    public function testRejectNonExceptionSubclass(): void
    {
        $this->expectException(\LogicException::class);
        new NonException();
    }
}
