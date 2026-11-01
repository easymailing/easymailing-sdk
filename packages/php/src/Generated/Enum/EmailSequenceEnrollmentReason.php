<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum EmailSequenceEnrollmentReason: string
{
    case Reentered = 'reentered';
    case NoEmail = 'no_email';
    case OptedOut = 'opted_out';
    case EnrollmentConflict = 'enrollment_conflict';
    case RecipientNotContactEmail = 'recipient_not_contact_email';
    case ContactNotFound = 'contact_not_found';
    case SequenceNotPublishableEntry = 'sequence_not_publishable_entry';
    case SenderNotAllowed = 'sender_not_allowed';
    case SequenceSenderMissing = 'sequence_sender_missing';
    case SequenceSenderRevoked = 'sequence_sender_revoked';
    case MailboxUnavailable = 'mailbox_unavailable';
    case SignatureForeign = 'signature_foreign';
}
