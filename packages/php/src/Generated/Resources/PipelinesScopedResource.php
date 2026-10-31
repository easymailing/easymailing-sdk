<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

final class PipelinesScopedResource
{
    public readonly PipelinesLossReasonsResource $lossReasons;
    public readonly PipelinesStagesResource $stages;

    public function __construct(
        \Easymailing\Sdk\Easymailing $client,
        private readonly string $pipelineUuid
    ) {
        $this->lossReasons = new PipelinesLossReasonsResource($client, ['pipelineUuid' => $this->pipelineUuid]);
        $this->stages = new PipelinesStagesResource($client, ['pipelineUuid' => $this->pipelineUuid]);
    }

}
