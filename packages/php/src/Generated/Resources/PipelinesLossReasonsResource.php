<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class PipelinesLossReasonsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineLossReasonCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineLossReasonCreateInput $body): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('POST', $this->resolvePath('/pipelines/{pipelineUuid}/loss_reasons', ['pipelineUuid' => $this->boundParams['pipelineUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/pipelines/{pipelineUuid}/loss_reasons');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineLossReasonUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineLossReasonUpdateInput $body): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/pipelines/{pipelineUuid}/loss_reasons/{uuid}', ['pipelineUuid' => $this->boundParams['pipelineUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/pipelines/{pipelineUuid}/loss_reasons/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

    public function archive(string $uuid): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/pipelines/{pipelineUuid}/loss_reasons/{uuid}/actions/archive', ['pipelineUuid' => $this->boundParams['pipelineUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/pipelines/{pipelineUuid}/loss_reasons/{uuid}/actions/archive');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

    public function restore(string $uuid): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/pipelines/{pipelineUuid}/loss_reasons/{uuid}/actions/restore', ['pipelineUuid' => $this->boundParams['pipelineUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/pipelines/{pipelineUuid}/loss_reasons/{uuid}/actions/restore');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

}
