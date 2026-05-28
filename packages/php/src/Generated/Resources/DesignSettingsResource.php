<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class DesignSettingsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/design_settings', []), query: $query, pathTemplate: '/design_settings');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_read => \Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_create $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_create $body): \Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/design_settings', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/design_settings');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/design_settings/{uuid}', ['uuid' => $uuid]), pathTemplate: '/design_settings/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_write $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_write $body): \Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/design_settings/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/design_settings/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/design_settings/{uuid}', ['uuid' => $uuid]), pathTemplate: '/design_settings/{uuid}');
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\DesignSetting_CreateFromUrlInput_design_setting_from_url $body
     */
    public function createFromUrl(array|\Easymailing\Sdk\Generated\Dto\DesignSetting_CreateFromUrlInput_design_setting_from_url $body): \Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/design_settings/from_url', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/design_settings/from_url');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\DesignSetting_design_setting_read::fromArray($data);
    }

}
