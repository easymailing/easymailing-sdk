<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AudiencesConditionFieldsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\ConditionField_condition_field_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/condition_fields', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), query: $query);
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\ConditionField_condition_field_read => \Easymailing\Sdk\Generated\Dto\ConditionField_condition_field_read::fromArray($item));
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\ConditionField_condition_field_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/condition_fields/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ConditionField_condition_field_read::fromArray($data);
    }

}
