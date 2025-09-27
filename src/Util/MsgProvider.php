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

namespace Haeckel\Exc\Util;

/** provides static methods to make creating exception messages easy via string templates */
final class MsgProvider
{
    /**
     * create message like the to TypeError standard message. Omits method and where call
     * originated. Should normally be use with TypeError and InvalidArgumentException or classes
     * extending these.
     * @see \TypeError
     * @see \InvalidArgumentException
     */
    public static function createTypeErrMsg(
        int $argPos,
        string $expectedType,
        string $actualType,
        ?string $argName = null,
    ): string {
        $argName = $argName !== null ? "($argName) " : '';
        return "Argument #$argPos {$argName}must be of type $expectedType, $actualType given";
    }
}
