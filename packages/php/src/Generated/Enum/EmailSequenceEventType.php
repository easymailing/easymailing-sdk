<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum EmailSequenceEventType: string
{
    case Enrolled = 'enrolled';
    case EmailSent = 'email_sent';
    case Exited = 'exited';
    case Completed = 'completed';
    case Paused = 'paused';
    case Resumed = 'resumed';
    case Failed = 'failed';
    case Retried = 'retried';
    case CommercialPaused = 'commercial_paused';
    case Reactivated = 'reactivated';
    case Archived = 'archived';
    case Restored = 'restored';
}
