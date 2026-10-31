<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum CrmRecordSource: string
{
    case Manual = 'manual';
    case Api = 'api';
    case Automation = 'automation';
    case ConnectedMailbox = 'connected_mailbox';
    case ConnectedCalendar = 'connected_calendar';
    case Integration = 'integration';
    case Import = 'import';
    case PublicForm = 'public_form';
    case MeetingBooking = 'meeting_booking';
}
