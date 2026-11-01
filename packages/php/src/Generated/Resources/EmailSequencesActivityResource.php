<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailSequencesActivityResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\EmailSequenceActivity_email_sequence_activity_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_sequences/{uuid}/activity', ['uuid' => $this->boundParams['uuid'] ?? null]), query: $query, pathTemplate: '/email_sequences/{uuid}/activity');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\EmailSequenceActivity_email_sequence_activity_read => \Easymailing\Sdk\Generated\Dto\EmailSequenceActivity_email_sequence_activity_read::fromArray($item));
    }

}
