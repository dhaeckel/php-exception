<?php

/**
 * @copyright 2025 Dominik Häckel
 * @license LGPL-3.0-or-later
 *
 * This file is part of haeckel/php-exception.
 *
 * haeckel/php-exception is free software:
 * you can redistribute it and/or modify it under the terms of the GNU Lesser General Public License
 * as published by the Free Software Foundation, either version 3 of the License,
 * or (at your option) any later version.
 *
 * haeckel/php-exception is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * haeckel/php-exception.
 * If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace Haeckel\Exc\LogCtxAware;

final class CtxAwareErrException extends \ErrorException implements CtxAwareThrowable
{
    use CtxAwareExceptionTrait;

    /** @param array<mixed> $context */
    public function __construct(
        string $message = '',
        array $context = [],
        int $severity = 1,
        string $filename = __FILE__,
        int $line = __LINE__,
        ?\Throwable $previous = null,
        int $code = 0
    ) {
        parent::__construct($message, $code, $severity, $filename, $line, $previous);
        $this->context = $context;
    }

    /**
     * @param array<mixed> $context
     * @param array{type:int,message:string,file:string,line:int} $error
     *
     * @link https://www.php.net/manual/en/function.error-get-last.php
     */
    public static function fromError(
        array $error,
        array $context = [],
        ?\Throwable $prev = null,
        int $code = 0,
    ): self {
        return new self(
            $error['message'],
            $context,
            $error['type'],
            $error['file'],
            $error['line'],
            $prev,
            $code,
        );
    }
}
