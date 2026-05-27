<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum CampaignDeliveryWarningCode: string
{
    case CampaignDeliveryWarningNoActiveSubscribers = 'campaign.delivery_warning.no_active_subscribers';
    case CampaignDeliveryWarningInsufficientCredits = 'campaign.delivery_warning.insufficient_credits';
    case CampaignDeliveryWarningDailyLimitExceeded = 'campaign.delivery_warning.daily_limit_exceeded';
    case CampaignDeliveryWarningSendDisabled = 'campaign.delivery_warning.send_disabled';
    case CampaignDeliveryWarningApprovalRequired = 'campaign.delivery_warning.approval_required';
    case CampaignDeliveryWarningApprovalPending = 'campaign.delivery_warning.approval_pending';
    case CampaignDeliveryWarningCannotSendWithoutAuthenticate = 'campaign.delivery_warning.cannot_send_without_authenticate';
    case CampaignDeliveryWarningSenderDomainNotAuthenticated = 'campaign.delivery_warning.sender_domain_not_authenticated';
    case CampaignDeliveryWarningCustomTrackingLinksError = 'campaign.delivery_warning.custom_tracking_links_error';
    case CampaignDeliveryWarningFreeEmailProvider = 'campaign.delivery_warning.free_email_provider';
    case CampaignDeliveryWarningDomainAuthenticationNotCreated = 'campaign.delivery_warning.domain_authentication_not_created';
}
