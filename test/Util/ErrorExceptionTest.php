<?php

declare(strict_types=1);

namespace Haeckel\Exc\Test\Util;

use Haeckel\Exc\Util\ExceptionFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

#[Small]
#[CoversClass(ExceptionFactory::class)]
final class ErrorExceptionTest extends TestCase
{
    public function testNewErrExceptionFromLastErr(): void
    {
        \trigger_error('test msg');
        $lastErr = \error_get_last();
        $e = ExceptionFactory::newErrExceptionFromLastErr();
        $this->assertEquals(
            new \ErrorException(
                'test msg',
                severity: $lastErr['type'],
                filename: $lastErr['file'],
                line: $lastErr['line'],
            ),
            $e,
        );
    }

    public function testNewErrExceptionFromLastErrWithMsg(): void
    {
        \trigger_error('test msg');
        $lastErr = \error_get_last();
        $e = ExceptionFactory::newErrExceptionFromLastErr(msg: 'error occurred');
        $this->assertEquals(
            new \ErrorException(
                'error occurred: test msg',
                severity: $lastErr['type'],
                filename: $lastErr['file'],
                line: $lastErr['line'],
            ),
            $e,
        );
    }

    public function testWithMsgOnly(): void
    {
        $e = ExceptionFactory::newErrExceptionFromLastErr(msg: 'error occurred');
        $this->assertEquals(new \ErrorException('error occurred'), $e);
    }

    public function testNewErrExceptionWithoutLastErr(): void
    {
        $e = ExceptionFactory::newErrExceptionFromLastErr();
        $this->assertEquals(new \ErrorException(), $e);
    }
}
