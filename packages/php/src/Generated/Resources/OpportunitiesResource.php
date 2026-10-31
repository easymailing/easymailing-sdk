<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class OpportunitiesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/opportunities', []), query: $query, pathTemplate: '/opportunities');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list => \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityCreateInput $body): \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail
    {
        $result = $this->client->request('POST', $this->resolvePath('/opportunities', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/opportunities');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail
    {
        $result = $this->client->request('GET', $this->resolvePath('/opportunities/{uuid}', ['uuid' => $uuid]), pathTemplate: '/opportunities/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityUpdateInput $body): \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/opportunities/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/opportunities/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/opportunities/{uuid}', ['uuid' => $uuid]), pathTemplate: '/opportunities/{uuid}');
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityLoseInput $body
     */
    public function lose(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityLoseInput $body): \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/opportunities/{uuid}/actions/lose', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/opportunities/{uuid}/actions/lose');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityPipelineMoveInput $body
     */
    public function movePipeline(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityPipelineMoveInput $body): \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/opportunities/{uuid}/actions/move_pipeline', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/opportunities/{uuid}/actions/move_pipeline');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityStageMoveInput $body
     */
    public function moveStage(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityStageMoveInput $body): \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/opportunities/{uuid}/actions/move_stage', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/opportunities/{uuid}/actions/move_stage');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityReopenInput $body
     */
    public function reopen(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityReopenInput $body): \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/opportunities/{uuid}/actions/reopen', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/opportunities/{uuid}/actions/reopen');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityWinInput $body
     */
    public function win(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityWinInput $body): \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/opportunities/{uuid}/actions/win', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/opportunities/{uuid}/actions/win');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Opportunity_opportunity_list_opportunity_detail::fromArray($data);
    }

    public function getPipelineMovePreview(string $uuid, string $pipeline): \Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityMovePreviewOutput_opportunity_move_preview_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/opportunities/{uuid}/pipeline_move_preview', ['uuid' => $uuid]), query: array_filter(['pipeline' => $pipeline], static fn($value): bool => $value !== null), pathTemplate: '/opportunities/{uuid}/pipeline_move_preview');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Opportunity_OpportunityMovePreviewOutput_opportunity_move_preview_read::fromArray($data);
    }

}
