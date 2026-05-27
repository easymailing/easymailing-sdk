<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

final class AutomationsScopedResource
{
    public readonly AutomationsAutomationQueuesResource $automationQueues;
    public readonly AutomationsAutomationStepsResource $automationSteps;
    public readonly AutomationsTriggersResource $triggers;

    public function __construct(
        \Easymailing\Sdk\Easymailing $client,
        private readonly string $automationUuid
    ) {
        $this->automationQueues = new AutomationsAutomationQueuesResource($client, ['automationUuid' => $this->automationUuid]);
        $this->automationSteps = new AutomationsAutomationStepsResource($client, ['automationUuid' => $this->automationUuid]);
        $this->triggers = new AutomationsTriggersResource($client, ['automationUuid' => $this->automationUuid]);
    }

}
