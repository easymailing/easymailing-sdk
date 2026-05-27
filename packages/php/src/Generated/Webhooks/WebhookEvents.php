<?php

// AUTO-GENERATED FROM packages/contract/webhook-events.json — DO NOT EDIT BY HAND.
// Regenerate with `composer generate:webhooks`.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Webhooks;

/**
 * Catalogue of webhook event_type values understood by the upstream API.
 *
 * The constant names match the upstream PHP enum (WebhookEventType::*) so
 * upstream-engineer code can copy-paste constant names verbatim.
 */
final class WebhookEvents
{
    public const CUSTOM_AUTOMATION_STEP = 'custom_automation_step';
    public const MEMBER_ADDED_TO_GROUP = 'member_added_to_group';
    public const MEMBER_AUTOMATION_CANCELLED = 'member_automation_cancelled';
    public const MEMBER_AUTOMATION_COMPLETED = 'member_automation_completed';
    public const MEMBER_AUTOMATION_STARTED = 'member_automation_started';
    public const MEMBER_CAMPAIGN_BOUNCED = 'member_campaign_bounced';
    public const MEMBER_CAMPAIGN_CLICKED = 'member_campaign_clicked';
    public const MEMBER_CAMPAIGN_COMPLAINED = 'member_campaign_complained';
    public const MEMBER_CAMPAIGN_DELIVERED = 'member_campaign_delivered';
    public const MEMBER_CAMPAIGN_OPENED = 'member_campaign_opened';
    public const MEMBER_REMOVED_FROM_GROUP = 'member_removed_from_group';
    public const MEMBER_SMS_BOUNCED = 'member_sms_bounced';
    public const MEMBER_SMS_CLICKED = 'member_sms_clicked';
    public const MEMBER_SMS_DELIVERED = 'member_sms_delivered';
    public const MEMBER_SMS_REPLIED = 'member_sms_replied';
    public const MEMBER_SMS_SUBSCRIBED = 'member_sms_subscribed';
    public const MEMBER_SMS_UNSUBSCRIBED = 'member_sms_unsubscribed';
    public const MEMBER_SUBSCRIBED = 'member_subscribed';
    public const MEMBER_UNSUBSCRIBED = 'member_unsubscribed';

    /** @return list<string> The full catalogue of known event_type values. */
    public static function all(): array
    {
        return [
            self::CUSTOM_AUTOMATION_STEP,
            self::MEMBER_ADDED_TO_GROUP,
            self::MEMBER_AUTOMATION_CANCELLED,
            self::MEMBER_AUTOMATION_COMPLETED,
            self::MEMBER_AUTOMATION_STARTED,
            self::MEMBER_CAMPAIGN_BOUNCED,
            self::MEMBER_CAMPAIGN_CLICKED,
            self::MEMBER_CAMPAIGN_COMPLAINED,
            self::MEMBER_CAMPAIGN_DELIVERED,
            self::MEMBER_CAMPAIGN_OPENED,
            self::MEMBER_REMOVED_FROM_GROUP,
            self::MEMBER_SMS_BOUNCED,
            self::MEMBER_SMS_CLICKED,
            self::MEMBER_SMS_DELIVERED,
            self::MEMBER_SMS_REPLIED,
            self::MEMBER_SMS_SUBSCRIBED,
            self::MEMBER_SMS_UNSUBSCRIBED,
            self::MEMBER_SUBSCRIBED,
            self::MEMBER_UNSUBSCRIBED,
        ];
    }
}
