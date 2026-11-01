<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum EmailParticipantRole: string
{
    case From = 'from';
    case To = 'to';
    case Cc = 'cc';
    case Bcc = 'bcc';
}
