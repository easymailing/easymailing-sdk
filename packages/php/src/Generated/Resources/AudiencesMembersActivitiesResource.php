<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AudiencesMembersActivitiesResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\MemberActivity_member_activity_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/members/{memberUuid}/activities', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'memberUuid' => $this->boundParams['memberUuid'] ?? null]), query: $query, pathTemplate: '/audiences/{audienceUuid}/members/{memberUuid}/activities');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\MemberActivity_member_activity_read => \Easymailing\Sdk\Generated\Dto\MemberActivity_member_activity_read::fromArray($item));
    }

}
