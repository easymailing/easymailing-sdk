<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AutomationsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Automation_automation_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/automations', []), query: $query);
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Automation_automation_read => \Easymailing\Sdk\Generated\Dto\Automation_automation_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Automation_automation_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Automation_automation_write $body): \Easymailing\Sdk\Generated\Dto\Automation_automation_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations', []), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Automation_automation_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Automation_automation_read_automation_read_detail
    {
        $result = $this->client->request('GET', $this->resolvePath('/automations/{uuid}', ['uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Automation_automation_read_automation_read_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Automation_automation_write $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Automation_automation_write $body): \Easymailing\Sdk\Generated\Dto\Automation_automation_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Automation_automation_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/automations/{uuid}', ['uuid' => $uuid]));
    }

    public function activate(string $uuid): \Easymailing\Sdk\Generated\Dto\Automation_automation_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{uuid}/actions/activate', ['uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Automation_automation_read::fromArray($data);
    }

    public function pause(string $uuid): \Easymailing\Sdk\Generated\Dto\Automation_automation_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{uuid}/actions/pause', ['uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Automation_automation_read::fromArray($data);
    }

}
