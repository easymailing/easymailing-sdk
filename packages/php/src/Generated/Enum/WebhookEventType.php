<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum WebhookEventType: string
{
    case MemberSubscribed = 'member_subscribed';
    case MemberUnsubscribed = 'member_unsubscribed';
    case MemberAddedToGroup = 'member_added_to_group';
    case MemberRemovedFromGroup = 'member_removed_from_group';
    case MemberCampaignOpened = 'member_campaign_opened';
    case MemberCampaignClicked = 'member_campaign_clicked';
    case MemberCampaignDelivered = 'member_campaign_delivered';
    case MemberCampaignBounced = 'member_campaign_bounced';
    case MemberCampaignComplained = 'member_campaign_complained';
    case MemberAutomationStarted = 'member_automation_started';
    case MemberAutomationCompleted = 'member_automation_completed';
    case MemberAutomationCancelled = 'member_automation_cancelled';
    case CustomAutomationStep = 'custom_automation_step';
    case MemberSmsSubscribed = 'member_sms_subscribed';
    case MemberSmsUnsubscribed = 'member_sms_unsubscribed';
    case MemberSmsDelivered = 'member_sms_delivered';
    case MemberSmsBounced = 'member_sms_bounced';
    case MemberSmsClicked = 'member_sms_clicked';
    case MemberSmsReplied = 'member_sms_replied';
}
