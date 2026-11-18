<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum WorkflowPieceKind: string
{
    case Trigger = 'trigger';
    case Step = 'step';
    case Wait = 'wait';
    case Loop = 'loop';
}
