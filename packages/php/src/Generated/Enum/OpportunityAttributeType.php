<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum OpportunityAttributeType: string
{
    case Text = 'text';
    case LongText = 'long_text';
    case Integer = 'integer';
    case Decimal = 'decimal';
    case Percentage = 'percentage';
    case Money = 'money';
    case Boolean = 'boolean';
    case Date = 'date';
    case Datetime = 'datetime';
    case Enum = 'enum';
    case MultiEnum = 'multi_enum';
    case Email = 'email';
    case Phone = 'phone';
    case Url = 'url';
    case Country = 'country';
    case Language = 'language';
    case Timezone = 'timezone';
}
