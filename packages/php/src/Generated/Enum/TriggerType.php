<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum TriggerType: string
{
    case TriggerAdminManual = 'trigger.admin.manual';
    case TriggerFormCompleted = 'trigger.form.completed';
    case TriggerContactSuscribed = 'trigger.contact.suscribed';
    case TriggerContactAddedToGroup = 'trigger.contact.added.to.group';
    case TriggerContactRemovedFromGroup = 'trigger.contact.removed.from.group';
    case TriggerSendACampaign = 'trigger.send.a.campaign';
    case TriggerClickOnCampaign = 'trigger.click.on.campaign';
    case TriggerClickOnCampaignLink = 'trigger.click.on.campaign.link';
    case TriggerNotClickOnCampaign = 'trigger.not.click.on.campaign';
    case TriggerOpenOnCampaign = 'trigger.open.on.campaign';
    case TriggerNotOpenOnCampaign = 'trigger.not.open.on.campaign';
    case TriggerSpecificDate = 'trigger.specific.date';
    case TriggerAniversaryDate = 'trigger.aniversary.date';
    case TriggerSuscriptionDate = 'trigger.suscription.date';
    case TriggerCustomApi = 'trigger.custom.api';
    case TriggerBuyAProduct = 'trigger.buy.a.product';
    case TriggerTimeSinceLastPurchase = 'trigger.time.since.last.purchase';
    case TriggerAbandonedCart = 'trigger.abandoned.cart';
    case TriggerPaymentReminder = 'trigger.payment.reminder';
    case TriggerOrderProcessed = 'trigger.order.processed';
    case TriggerOrderPaid = 'trigger.order.paid';
    case TriggerOrderShipped = 'trigger.order.shipped';
    case TriggerOrderCancelled = 'trigger.order.cancelled';
    case TriggerOrderRefunded = 'trigger.order.refunded';
    case TriggerSuscriberRevalidation = 'trigger.suscriber.revalidation';
}
