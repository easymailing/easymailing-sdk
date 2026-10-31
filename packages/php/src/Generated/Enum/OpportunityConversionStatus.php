<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum OpportunityConversionStatus: string
{
    case SameCurrency = 'same_currency';
    case Converted = 'converted';
    case Pending = 'pending';
    case Unavailable = 'unavailable';
    case NoAmount = 'no_amount';
}
