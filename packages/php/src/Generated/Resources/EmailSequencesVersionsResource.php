<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailSequencesVersionsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    public function get(string $revision): \Easymailing\Sdk\Generated\Dto\EmailSequenceVersion_email_sequence_version_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_sequences/{uuid}/versions/{revision}', ['uuid' => $this->boundParams['uuid'] ?? null, 'revision' => $revision]), pathTemplate: '/email_sequences/{uuid}/versions/{revision}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequenceVersion_email_sequence_version_read::fromArray($data);
    }

}
