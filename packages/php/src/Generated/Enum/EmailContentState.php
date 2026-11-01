<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum EmailContentState: string
{
    case IndexOnly = 'index_only';
    case Hydrating = 'hydrating';
    case Full = 'full';
    case Unavailable = 'unavailable';
}
