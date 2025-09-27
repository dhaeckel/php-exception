<?php

declare(strict_types=1);

namespace Haeckel\Exc\Test\LogCtxAware;

use Haeckel\Exc\LogCtxAware\CtxAwareErrException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

#[Small]
#[CoversClass(CtxAwareErrException::class)]
final class CtxAwareErrExceptionTest extends TestCase
{
    public function testConstruct(): void
    {
        $err = new CtxAwareErrException(context: ['foo' => 'bar']);
        $this->assertInstanceOf(\ErrorException::class, $err);
        $this->assertEquals(['foo' => 'bar'], $err->getContext());
    }

    public function testFromError(): void
    {
        \trigger_error('foo', \E_USER_NOTICE);
        $e = \error_get_last();
        $exc = CtxAwareErrException::fromError($e, ['foo' => 'bar']);
        $this->assertInstanceOf(\ErrorException::class, $exc);
        $this->assertEquals(['foo' => 'bar'], $exc->getContext());
        $this->assertEquals($e['message'], $exc->getMessage());
        $this->assertEquals($e['type'], $exc->getSeverity());
        $this->assertEquals($e['line'], $exc->getLine());
        $this->assertEquals($e['file'], $exc->getFile());
    }
}
