<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class ContactFilterFieldsSuggestionsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\ContactFilterFieldSuggestion_contact_filter_field_suggestion_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/contact_filter_fields/{fieldId}/suggestions', ['fieldId' => $this->boundParams['fieldId'] ?? null]), query: $query, pathTemplate: '/contact_filter_fields/{fieldId}/suggestions');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\ContactFilterFieldSuggestion_contact_filter_field_suggestion_read => \Easymailing\Sdk\Generated\Dto\ContactFilterFieldSuggestion_contact_filter_field_suggestion_read::fromArray($item));
    }

}
