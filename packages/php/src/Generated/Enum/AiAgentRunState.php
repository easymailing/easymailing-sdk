<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum AiAgentRunState: string
{
    case Queued = 'queued';
    case Running = 'running';
    case WaitingApproval = 'waiting_approval';
    case Completed = 'completed';
    case Stopped = 'stopped';
}
