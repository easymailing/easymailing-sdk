<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum WorkflowExecutionStepState: string
{
    case Running = 'running';
    case Waiting = 'waiting';
    case AwaitingEffect = 'awaiting_effect';
    case Retryable = 'retryable';
    case Completed = 'completed';
    case Skipped = 'skipped';
    case Stopped = 'stopped';
    case Blocked = 'blocked';
    case Canceled = 'canceled';
}
