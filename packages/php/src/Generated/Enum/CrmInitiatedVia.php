<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum CrmInitiatedVia: string
{
    case Ui = 'ui';
    case Maia = 'maia';
    case Api = 'api';
    case Import = 'import';
    case Sync = 'sync';
    case Automation = 'automation';
    case System = 'system';
}
