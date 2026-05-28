<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class TreatmentPurposesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/treatment_purposes', []), query: $query, pathTemplate: '/treatment_purposes');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_read => \Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_write $body): \Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/treatment_purposes', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/treatment_purposes');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/treatment_purposes/{uuid}', ['uuid' => $uuid]), pathTemplate: '/treatment_purposes/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_write $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_write $body): \Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/treatment_purposes/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/treatment_purposes/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\TreatmentPurpose_treatment_purpose_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/treatment_purposes/{uuid}', ['uuid' => $uuid]), pathTemplate: '/treatment_purposes/{uuid}');
    }

}
