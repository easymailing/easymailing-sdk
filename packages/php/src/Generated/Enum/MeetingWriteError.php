<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum MeetingWriteError: string
{
    case PermissionMissing = 'permission_missing';
    case ProviderRejected = 'provider_rejected';
    case EventIdTaken = 'event_id_taken';
    case NotConfirmed = 'not_confirmed';
    case ProviderVersionConflict = 'provider_version_conflict';
    case CalendarUnavailable = 'calendar_unavailable';
    case CalendarNotWritable = 'calendar_not_writable';
}
