<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum EmailParticipantKind: string
{
    case Member = 'member';
    case SharedMailbox = 'shared_mailbox';
    case Contact = 'contact';
    case Internal = 'internal';
    case External = 'external';
}
