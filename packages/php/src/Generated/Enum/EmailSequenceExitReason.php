<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum EmailSequenceExitReason: string
{
    case Completed = 'completed';
    case Reply = 'reply';
    case MeetingBooked = 'meeting_booked';
    case Unsubscribe = 'unsubscribe';
    case Bounce = 'bounce';
    case InvalidAddress = 'invalid_address';
    case Suppressed = 'suppressed';
    case CommercialBlock = 'commercial_block';
    case ManualExclusion = 'manual_exclusion';
    case SubjectRemoved = 'subject_removed';
    case MissingRequiredData = 'missing_required_data';
}
