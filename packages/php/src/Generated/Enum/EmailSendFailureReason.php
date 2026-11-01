<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum EmailSendFailureReason: string
{
    case Rejected = 'rejected';
    case TooLarge = 'too_large';
    case SendingLimit = 'sending_limit';
    case AccessLost = 'access_lost';
    case PermissionLost = 'permission_lost';
    case CapabilityInactive = 'capability_inactive';
    case AttachmentUnavailable = 'attachment_unavailable';
    case MessageTooLarge = 'message_too_large';
    case ProviderUnavailable = 'provider_unavailable';
    case PersonalizationFailed = 'personalization_failed';
}
