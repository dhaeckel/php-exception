<?php

declare(strict_types=1);

namespace Haeckel\Exc\LogCtxAware;

final class CtxAwareBadFuncCallException extends \BadFunctionCallException implements
    CtxAwareThrowable
{
    use CtxAwareExceptionTrait;
}
