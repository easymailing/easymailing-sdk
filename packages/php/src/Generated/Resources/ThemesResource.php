<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class ThemesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Theme_theme_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/themes', []), query: $query, pathTemplate: '/themes');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Theme_theme_read => \Easymailing\Sdk\Generated\Dto\Theme_theme_read::fromArray($item));
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Theme_theme_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/themes/{uuid}', ['uuid' => $uuid]), pathTemplate: '/themes/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Theme_theme_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Theme_CreateTemplateFromThemeInput_theme_write $body
     */
    public function createTemplate(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Theme_CreateTemplateFromThemeInput_theme_write $body): \Easymailing\Sdk\Generated\Dto\Theme_TemplateResource_template_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/themes/{uuid}/actions/create_template', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/themes/{uuid}/actions/create_template');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Theme_TemplateResource_template_read::fromArray($data);
    }

}
