<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AudiencesMembersResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Member_member_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/members', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), query: $query, pathTemplate: '/audiences/{audienceUuid}/members');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Member_member_read => \Easymailing\Sdk\Generated\Dto\Member_member_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Member_member_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Member_member_write $body, ?bool $disableDoubleOptIn = null, ?bool $disableWelcomeEmail = null, ?bool $disableSmsDoubleOptIn = null): \Easymailing\Sdk\Generated\Dto\Member_member_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/members', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray(), query: array_filter(['disableDoubleOptIn' => $disableDoubleOptIn, 'disableWelcomeEmail' => $disableWelcomeEmail, 'disableSmsDoubleOptIn' => $disableSmsDoubleOptIn], static fn($value): bool => $value !== null), pathTemplate: '/audiences/{audienceUuid}/members');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Member_member_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Member_member_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/members/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/members/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Member_member_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Member_member_write $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Member_member_write $body): \Easymailing\Sdk\Generated\Dto\Member_member_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/members/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/members/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Member_member_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/audiences/{audienceUuid}/members/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/members/{uuid}');
    }

    public function addToGroup(string $uuid, string $groupUuid): \Easymailing\Sdk\Generated\Dto\Member_member_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/members/{uuid}/actions/add_to_group/{groupUuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid, 'groupUuid' => $groupUuid]), pathTemplate: '/audiences/{audienceUuid}/members/{uuid}/actions/add_to_group/{groupUuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Member_member_read::fromArray($data);
    }

    public function removeFromGroup(string $uuid, string $groupUuid): \Easymailing\Sdk\Generated\Dto\Member_member_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/members/{uuid}/actions/remove_from_group/{groupUuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid, 'groupUuid' => $groupUuid]), pathTemplate: '/audiences/{audienceUuid}/members/{uuid}/actions/remove_from_group/{groupUuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Member_member_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Member_member_action $body
     */
    public function subscribe(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Member_member_action $body): \Easymailing\Sdk\Generated\Dto\Member_member_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/members/{uuid}/actions/subscribe', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/members/{uuid}/actions/subscribe');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Member_member_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Member_member_action $body
     */
    public function unsubscribe(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Member_member_action $body): \Easymailing\Sdk\Generated\Dto\Member_member_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/members/{uuid}/actions/unsubscribe', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/members/{uuid}/actions/unsubscribe');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Member_member_read::fromArray($data);
    }

}
