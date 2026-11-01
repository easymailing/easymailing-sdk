<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum EmailAccessLevel: string
{
    case MetadataOnly = 'metadata_only';
    case SubjectAndMetadata = 'subject_and_metadata';
    case FullAccess = 'full_access';
}
