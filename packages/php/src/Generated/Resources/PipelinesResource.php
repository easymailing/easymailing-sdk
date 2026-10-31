<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class PipelinesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/pipelines', []), query: $query, pathTemplate: '/pipelines');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list => \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineCreateInput $body): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('POST', $this->resolvePath('/pipelines', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/pipelines');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('GET', $this->resolvePath('/pipelines/{uuid}', ['uuid' => $uuid]), pathTemplate: '/pipelines/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineUpdateInput $body): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/pipelines/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/pipelines/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

    public function delete(string $uuid, ?string $replacementDefault = null): void
    {
        $this->client->request('DELETE', $this->resolvePath('/pipelines/{uuid}', ['uuid' => $uuid]), query: array_filter(['replacement_default' => $replacementDefault], static fn($value): bool => $value !== null), pathTemplate: '/pipelines/{uuid}');
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineFromTemplateInput $body
     */
    public function fromTemplate(array|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineFromTemplateInput $body): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('POST', $this->resolvePath('/pipelines/actions/from_template', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/pipelines/actions/from_template');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

    public function makeDefault(string $uuid): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/pipelines/{uuid}/actions/make_default', ['uuid' => $uuid]), pathTemplate: '/pipelines/{uuid}/actions/make_default');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineLossReasonsOrderInput $body
     */
    public function reorderLossReasons(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineLossReasonsOrderInput $body): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/pipelines/{uuid}/actions/reorder_loss_reasons', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/pipelines/{uuid}/actions/reorder_loss_reasons');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineStagesOrderInput $body
     */
    public function reorderStages(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineStagesOrderInput $body): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/pipelines/{uuid}/actions/reorder_stages', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/pipelines/{uuid}/actions/reorder_stages');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineInitialStageInput $body
     */
    public function setInitialStage(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Pipeline_PipelineInitialStageInput $body): \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/pipelines/{uuid}/actions/set_initial_stage', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/pipelines/{uuid}/actions/set_initial_stage');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Pipeline_pipeline_list_pipeline_detail::fromArray($data);
    }

}
