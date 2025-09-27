<?php

declare(strict_types=1);

namespace Haeckel\Exc\LogCtxAware;

class CtxAwareOutOfRangeException extends \OutOfRangeException implements CtxAwareThrowable
{
    use CtxAwareExceptionTrait;
}
