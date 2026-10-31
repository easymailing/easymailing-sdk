<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AudiencesSurveysResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Survey_survey_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/surveys', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), query: $query, pathTemplate: '/audiences/{audienceUuid}/surveys');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Survey_survey_read => \Easymailing\Sdk\Generated\Dto\Survey_survey_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Survey_CreateSurveyInput_survey_write_create_survey $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Survey_CreateSurveyInput_survey_write_create_survey $body): \Easymailing\Sdk\Generated\Dto\Survey_survey_read_survey_read_detail
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/surveys', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/surveys');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Survey_survey_read_survey_read_detail::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Survey_survey_read_survey_read_detail
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/surveys/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/surveys/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Survey_survey_read_survey_read_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Survey_UpdateSurveyInput_survey_write_update_survey $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Survey_UpdateSurveyInput_survey_write_update_survey $body): \Easymailing\Sdk\Generated\Dto\Survey_survey_read_survey_read_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/surveys/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/surveys/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Survey_survey_read_survey_read_detail::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/audiences/{audienceUuid}/surveys/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/surveys/{uuid}');
    }

    /**
     * @return array<string, mixed>
     */
    public function activate(string $uuid): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/surveys/{uuid}/actions/activate', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/surveys/{uuid}/actions/activate');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

    /**
     * @return array<string, mixed>
     */
    public function close(string $uuid): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/surveys/{uuid}/actions/close', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/surveys/{uuid}/actions/close');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

    public function getStats(string $uuid): \Easymailing\Sdk\Generated\Dto\Survey_SurveyStatsOutput_survey_stats
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/surveys/{uuid}/stats', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/surveys/{uuid}/stats');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Survey_SurveyStatsOutput_survey_stats::fromArray($data);
    }

}
