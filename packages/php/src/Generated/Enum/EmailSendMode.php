<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum EmailSendMode: string
{
    case Compose = 'compose';
    case Reply = 'reply';
    case ReplyAll = 'reply_all';
    case Forward = 'forward';
}
