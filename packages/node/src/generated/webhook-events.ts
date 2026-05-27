// AUTO-GENERATED FROM packages/contract/webhook-events.json — DO NOT EDIT BY HAND.
// Regenerate with `pnpm --filter @easymailing/sdk generate:webhooks`.

export type KnownEventType =
  | "custom_automation_step"
  | "member_added_to_group"
  | "member_automation_cancelled"
  | "member_automation_completed"
  | "member_automation_started"
  | "member_campaign_bounced"
  | "member_campaign_clicked"
  | "member_campaign_complained"
  | "member_campaign_delivered"
  | "member_campaign_opened"
  | "member_removed_from_group"
  | "member_sms_bounced"
  | "member_sms_clicked"
  | "member_sms_delivered"
  | "member_sms_replied"
  | "member_sms_subscribed"
  | "member_sms_unsubscribed"
  | "member_subscribed"
  | "member_unsubscribed"
  ;

export interface KnownEventTypeMap {
  "custom_automation_step": unknown;
  "member_added_to_group": unknown;
  "member_automation_cancelled": unknown;
  "member_automation_completed": unknown;
  "member_automation_started": unknown;
  "member_campaign_bounced": unknown;
  "member_campaign_clicked": unknown;
  "member_campaign_complained": unknown;
  "member_campaign_delivered": unknown;
  "member_campaign_opened": unknown;
  "member_removed_from_group": unknown;
  "member_sms_bounced": unknown;
  "member_sms_clicked": unknown;
  "member_sms_delivered": unknown;
  "member_sms_replied": unknown;
  "member_sms_subscribed": unknown;
  "member_sms_unsubscribed": unknown;
  "member_subscribed": unknown;
  "member_unsubscribed": unknown;
}

/**
 * Discriminated webhook event narrowed by `event_type`. `data` is `unknown` for
 * now; a follow-up plan will tighten each entry of KnownEventTypeMap to a
 * concrete DTO. Unknown event_types are NOT modelled here — callers receive a
 * generic WebhookEventBase<unknown> from parseWebhookEvent in that case.
 */
export type TypedWebhookEvent = {
  [K in KnownEventType]: {
    event_type: K;
    webhook_id?: string;
    data: KnownEventTypeMap[K];
    [key: string]: unknown;
  };
}[KnownEventType];
