<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailSequencesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_list>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_sequences', []), query: $query, pathTemplate: '/email_sequences');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_list => \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_list::fromArray($item));
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\EmailSequencePersonalizationTag_email_sequence_personalization_tag_read>
     */
    public function listPersonalizationTags(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_sequences/personalization_tags', []), query: $query, pathTemplate: '/email_sequences/personalization_tags');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\EmailSequencePersonalizationTag_email_sequence_personalization_tag_read => \Easymailing\Sdk\Generated\Dto\EmailSequencePersonalizationTag_email_sequence_personalization_tag_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailSequence_EmailSequenceCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\EmailSequence_EmailSequenceCreateInput $body): \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/email_sequences', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_sequences');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_sequences/{uuid}', ['uuid' => $uuid]), pathTemplate: '/email_sequences/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/email_sequences/{uuid}', ['uuid' => $uuid]), pathTemplate: '/email_sequences/{uuid}');
    }

    public function archive(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sequences/{uuid}/actions/archive', ['uuid' => $uuid]), pathTemplate: '/email_sequences/{uuid}/actions/archive');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailSequence_EmailSequenceDuplicateInput $body
     */
    public function duplicate(string $uuid, array|\Easymailing\Sdk\Generated\Dto\EmailSequence_EmailSequenceDuplicateInput $body): \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/email_sequences/{uuid}/actions/duplicate', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_sequences/{uuid}/actions/duplicate');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailSequenceEnrollmentRun_EmailSequenceEnrollInput $body
     */
    public function enroll(string $uuid, array|\Easymailing\Sdk\Generated\Dto\EmailSequenceEnrollmentRun_EmailSequenceEnrollInput $body): \Easymailing\Sdk\Generated\Dto\EmailSequenceEnrollmentRun_email_sequence_enrollment_run_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/email_sequences/{uuid}/actions/enroll', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_sequences/{uuid}/actions/enroll');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequenceEnrollmentRun_email_sequence_enrollment_run_read::fromArray($data);
    }

    public function pause(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sequences/{uuid}/actions/pause', ['uuid' => $uuid]), pathTemplate: '/email_sequences/{uuid}/actions/pause');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailSequence_EmailSequencePublishInput $body
     */
    public function publish(string $uuid, array|\Easymailing\Sdk\Generated\Dto\EmailSequence_EmailSequencePublishInput $body): \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/email_sequences/{uuid}/actions/publish', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_sequences/{uuid}/actions/publish');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read::fromArray($data);
    }

    public function reactivate(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sequences/{uuid}/actions/reactivate', ['uuid' => $uuid]), pathTemplate: '/email_sequences/{uuid}/actions/reactivate');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read::fromArray($data);
    }

    public function restore(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sequences/{uuid}/actions/restore', ['uuid' => $uuid]), pathTemplate: '/email_sequences/{uuid}/actions/restore');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read::fromArray($data);
    }

    public function resume(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sequences/{uuid}/actions/resume', ['uuid' => $uuid]), pathTemplate: '/email_sequences/{uuid}/actions/resume');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read::fromArray($data);
    }

    public function getStatistics(string $uuid, ?string $timezone = null): \Easymailing\Sdk\Generated\Dto\EmailSequenceStatistics_email_sequence_statistics_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_sequences/{uuid}/statistics', ['uuid' => $uuid]), query: array_filter(['timezone' => $timezone], static fn($value): bool => $value !== null), pathTemplate: '/email_sequences/{uuid}/statistics');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequenceStatistics_email_sequence_statistics_read::fromArray($data);
    }

    public function getValidation(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSequenceValidation_email_sequence_validation_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_sequences/{uuid}/validation', ['uuid' => $uuid]), pathTemplate: '/email_sequences/{uuid}/validation');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequenceValidation_email_sequence_validation_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailSequence_EmailSequenceDraftInput $body
     */
    public function updateDraft(string $uuid, array|\Easymailing\Sdk\Generated\Dto\EmailSequence_EmailSequenceDraftInput $body): \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sequences/{uuid}/draft', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_sequences/{uuid}/draft');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequence_email_sequence_read::fromArray($data);
    }

}
