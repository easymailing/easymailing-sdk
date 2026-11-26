<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Enum;

enum AiAgentRunStopCause: string
{
    case AiCreditsExhausted = 'ai_credits_exhausted';
    case AiOverageExhausted = 'ai_overage_exhausted';
    case AiAgentsCapReached = 'ai_agents_cap_reached';
    case AiAgentCapReached = 'ai_agent_cap_reached';
    case AiCreditsInsufficient = 'ai_credits_insufficient';
    case AiOverageUnlimited = 'ai_overage_unlimited';
    case AiPaymentPending = 'ai_payment_pending';
    case EconomicEntitlementUnavailable = 'economic_entitlement_unavailable';
    case AgentUnavailable = 'agent_unavailable';
    case AiUnavailable = 'ai_unavailable';
    case AiOutputInvalid = 'ai_output_invalid';
}
