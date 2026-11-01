<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum MeetingResponseStatus: string
{
    case Accepted = 'accepted';
    case Tentative = 'tentative';
    case Declined = 'declined';
    case Pending = 'pending';
}
