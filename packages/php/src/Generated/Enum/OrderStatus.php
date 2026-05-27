<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum OrderStatus: string
{
    case Cart = 'cart';
    case New = 'new';
    case Paid = 'paid';
    case Shipped = 'shipped';
    case Refunded = 'refunded';
    case Cancelled = 'cancelled';
}
