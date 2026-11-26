<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum WorkflowSubjectType: string
{
    case Contact = 'contact';
    case Company = 'company';
    case Opportunity = 'opportunity';
    case Task = 'task';
    case Meeting = 'meeting';
    case Note = 'note';
    case Subscription = 'subscription';
    case Order = 'order';
    case Cart = 'cart';
    case SurveyResponse = 'survey_response';
    case OpportunityContact = 'opportunity_contact';
    case MeetingContact = 'meeting_contact';
    case WebhookRequest = 'webhook_request';
}
