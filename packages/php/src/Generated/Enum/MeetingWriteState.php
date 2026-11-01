<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum MeetingWriteState: string
{
    case Pending = 'pending';
    case Uncertain = 'uncertain';
    case Confirmed = 'confirmed';
    case Conflict = 'conflict';
    case Failed = 'failed';
}
