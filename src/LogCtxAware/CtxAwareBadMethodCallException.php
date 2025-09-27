<?php

declare(strict_types=1);

namespace Haeckel\Exc\LogCtxAware;

final class CtxAwareBadMethodCallException extends \BadMethodCallException implements
    CtxAwareThrowable
{
    use CtxAwareExceptionTrait;
}
