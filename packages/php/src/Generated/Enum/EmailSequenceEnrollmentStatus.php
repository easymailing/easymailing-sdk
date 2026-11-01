<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum EmailSequenceEnrollmentStatus: string
{
    case Scheduled = 'scheduled';
    case Active = 'active';
    case TechnicalError = 'technical-error';
    case Completed = 'completed';
    case Excluded = 'excluded';
    case Bounced = 'bounced';
    case Replied = 'replied';
    case MeetingBooked = 'meeting-booked';
    case AutomaticReply = 'automatic-reply';
    case Paused = 'paused';
}
