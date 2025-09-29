<?php

declare(strict_types=1);

namespace Haeckel\Exc\Util;

/** Provides factory methods for Exception creation */
final class ExceptionFactory
{
    /**
     * Create an \ErrorException from the last error that occurred. Will pick up the last error if
     * null is passed
     * @param array{type: int, message: string, file: string, line: int}|null $lastErr
     *
     * @link https://php.net/manual/en/function.error-get-last.php
     */
    public static function newErrExceptionFromLastErr(?array $lastErr = null): \ErrorException
    {
        $lastErr ??= \error_get_last();
        if ($lastErr === null) {
            // throw blank err exception when last err is not set
            return new \ErrorException();
        }

        return new \ErrorException(
            $lastErr['message'],
            severity: $lastErr['type'],
            filename: $lastErr['file'],
            line: $lastErr['line'],
        );
    }
}
