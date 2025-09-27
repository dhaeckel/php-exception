<?php

declare(strict_types=1);

namespace Haeckel\Exc\LogCtxAware;

class CtxAwareDomainException extends \DomainException implements CtxAwareThrowable
{
    use CtxAwareExceptionTrait;
}
