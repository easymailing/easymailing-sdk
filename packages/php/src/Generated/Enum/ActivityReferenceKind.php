<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum ActivityReferenceKind: string
{
    case Note = 'note';
    case Task = 'task';
    case Contact = 'contact';
    case Company = 'company';
    case Opportunity = 'opportunity';
    case Automation = 'automation';
    case Form = 'form';
    case Survey = 'survey';
    case File = 'file';
    case Import = 'import';
}
