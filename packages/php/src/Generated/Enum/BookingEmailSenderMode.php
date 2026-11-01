<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum BookingEmailSenderMode: string
{
    case Direct = 'direct';
    case Mailbyem = 'mailbyem';
    case NeedsAuthentication = 'needs_authentication';
    case Unavailable = 'unavailable';
}
