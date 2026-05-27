<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum AsyncTaskType: string
{
    case SegmentAddToGroup = 'segment.add_to_group';
    case SegmentRemoveFromGroup = 'segment.remove_from_group';
    case SegmentExport = 'segment.export';
    case SegmentUnsubscribe = 'segment.unsubscribe';
    case SegmentDeleteContacts = 'segment.delete_contacts';
    case GroupExport = 'group.export';
    case GroupClear = 'group.clear';
    case GroupAddFromSegment = 'group.add_from_segment';
    case GroupRemoveFromSegment = 'group.remove_from_segment';
    case GroupAddFromConditions = 'group.add_from_conditions';
    case GroupRemoveFromConditions = 'group.remove_from_conditions';
}
