<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum CampaignSendTo: string
{
    case SendToAll = 'send_to_all';
    case SendToSegment = 'send_to_segment';
    case SendToGroups = 'send_to_groups';
}
