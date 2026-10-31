<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class PipelinesStagesResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineStageCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineStageCreateInput $body): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('POST', $this->resolvePath('/pipelines/{pipelineUuid}/stages', ['pipelineUuid' => $this->boundParams['pipelineUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/pipelines/{pipelineUuid}/stages');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineStageUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineStageUpdateInput $body): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/pipelines/{pipelineUuid}/stages/{uuid}', ['pipelineUuid' => $this->boundParams['pipelineUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/pipelines/{pipelineUuid}/stages/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/pipelines/{pipelineUuid}/stages/{uuid}', ['pipelineUuid' => $this->boundParams['pipelineUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/pipelines/{pipelineUuid}/stages/{uuid}');
    }

}
