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

trait CtxAwareExceptionTrait
{
    /** @var array<mixed> */
    protected array $context;

    /**
     * @param array<mixed> $context
     *
     * @throws \LogicException if the class this trait is used in is not a subclass of Exception
     */
    public function __construct(
        string $message = '',
        array $context = [],
        int $code = 0,
        ?\Throwable $previous = null
    ) {
        // @phpstan-ignore function.alreadyNarrowedType
        if (! \is_subclass_of($this, \Exception::class)) {
            throw new \LogicException(
                'trait must be used in class that is subclass of ' . \Exception::class
            );
        }
        parent::__construct($message, $code, $previous);
        $this->context = $context;
    }

    /** @return array<mixed> */
    public function getContext(): array
    {
        return $this->context;
    }
}
