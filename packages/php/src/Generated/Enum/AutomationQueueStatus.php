<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum AutomationQueueStatus: string
{
    case AutomationQueueStatusQueued = 'automation.queue.status.queued';
    case AutomationQueueStatusCanceled = 'automation.queue.status.canceled';
    case AutomationQueueStatusCompleted = 'automation.queue.status.completed';
}
