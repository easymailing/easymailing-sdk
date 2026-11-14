<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum WorkflowExecutionState: string
{
    case Active = 'active';
    case Waiting = 'waiting';
    case Blocked = 'blocked';
    case Completed = 'completed';
    case Stopped = 'stopped';
    case Canceled = 'canceled';
}
