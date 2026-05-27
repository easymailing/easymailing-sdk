<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum StepType: string
{
    case StepSendCampaign = 'step.send.campaign';
    case StepSendSms = 'step.send.sms';
    case StepCondition = 'step.condition';
    case StepDelay = 'step.delay';
    case StepCustomField = 'step.custom.field';
    case StepAddToGroup = 'step.add.to.group';
    case StepRemoveFromGroup = 'step.remove.from.group';
    case StepUnsuscribe = 'step.unsuscribe';
    case StepUpdateScore = 'step.update.score';
    case StepSendNotification = 'step.send.notification';
    case StepTriggerAutomation = 'step.trigger.automation';
    case StepMoveToStep = 'step.move.to.step';
    case StepSendWebhook = 'step.send.webhook';
}
