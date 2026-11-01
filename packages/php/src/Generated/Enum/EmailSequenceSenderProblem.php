<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum EmailSequenceSenderProblem: string
{
    case Missing = 'missing';
    case MailboxUnavailable = 'mailbox_unavailable';
    case NotAllowed = 'not_allowed';
    case SignatureMissing = 'signature_missing';
}
