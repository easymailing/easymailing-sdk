<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum CampaignDeferredStrategy: string
{
    case Incremental = 'incremental';
    case FixedBatchesByCount = 'fixed_batches_by_count';
    case FixedBatchesBySize = 'fixed_batches_by_size';
}
