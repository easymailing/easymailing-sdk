<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailSequencesEnrollmentsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\EmailSequenceEnrollment_email_sequence_enrollment_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_sequences/{uuid}/enrollments', ['uuid' => $this->boundParams['uuid'] ?? null]), query: $query, pathTemplate: '/email_sequences/{uuid}/enrollments');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\EmailSequenceEnrollment_email_sequence_enrollment_read => \Easymailing\Sdk\Generated\Dto\EmailSequenceEnrollment_email_sequence_enrollment_read::fromArray($item));
    }

    /**
     * @return array<string, mixed>
     */
    public function exclude(string $enrollmentUuid): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/exclude', ['uuid' => $this->boundParams['uuid'] ?? null, 'enrollmentUuid' => $enrollmentUuid]), pathTemplate: '/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/exclude');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

    /**
     * @return array<string, mixed>
     */
    public function pause(string $enrollmentUuid): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/pause', ['uuid' => $this->boundParams['uuid'] ?? null, 'enrollmentUuid' => $enrollmentUuid]), pathTemplate: '/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/pause');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

    /**
     * @return array<string, mixed>
     */
    public function resume(string $enrollmentUuid): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/resume', ['uuid' => $this->boundParams['uuid'] ?? null, 'enrollmentUuid' => $enrollmentUuid]), pathTemplate: '/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/resume');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

    /**
     * @return array<string, mixed>
     */
    public function retry(string $enrollmentUuid): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/retry', ['uuid' => $this->boundParams['uuid'] ?? null, 'enrollmentUuid' => $enrollmentUuid]), pathTemplate: '/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/retry');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

}
