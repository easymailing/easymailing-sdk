<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum EmailSequenceEnrollmentOutcome: string
{
    case Enrolled = 'enrolled';
    case Skipped = 'skipped';
    case Failed = 'failed';
}
