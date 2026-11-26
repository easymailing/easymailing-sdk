<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum WorkflowStatus: string
{
    case Draft = 'draft';
    case Active = 'active';
    case Paused = 'paused';
    case CommercialPaused = 'commercial-paused';
}
