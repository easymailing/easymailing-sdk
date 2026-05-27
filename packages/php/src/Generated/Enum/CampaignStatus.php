<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum CampaignStatus: string
{
    case CampaignStatusDraft = 'campaign.status.draft';
    case CampaignStatusReady = 'campaign.status.ready';
    case CampaignStatusScheduled = 'campaign.status.scheduled';
    case CampaignStatusSending = 'campaign.status.sending';
    case CampaignStatusSent = 'campaign.status.sent';
    case CampaignStatusError = 'campaign.status.error';
    case CampaignStatusPausing = 'campaign.status.pausing';
    case CampaignStatusPaused = 'campaign.status.paused';
}
