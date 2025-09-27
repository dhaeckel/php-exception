<?php

declare(strict_types=1);

namespace Haeckel\Exc\LogCtxAware;

final class CtxAwareLengthException extends \LengthException implements CtxAwareThrowable
{
    use CtxAwareExceptionTrait;
}
