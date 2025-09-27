<?php

declare(strict_types=1);

namespace Haeckel\Exc\Test\LogCtxAware;

use Haeckel\Exc\LogCtxAware\CtxAwareExceptionTrait;

final class NonException extends \ArrayObject
{
    use CtxAwareExceptionTrait;
}
