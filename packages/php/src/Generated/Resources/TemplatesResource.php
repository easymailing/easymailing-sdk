<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class TemplatesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Template_template_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/templates', []), query: $query);
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Template_template_read => \Easymailing\Sdk\Generated\Dto\Template_template_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Template_template_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Template_template_write $body): \Easymailing\Sdk\Generated\Dto\Template_template_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/templates', []), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Template_template_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Template_template_read_template_read_detail
    {
        $result = $this->client->request('GET', $this->resolvePath('/templates/{uuid}', ['uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Template_template_read_template_read_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Template_template_write $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Template_template_write $body): \Easymailing\Sdk\Generated\Dto\Template_template_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/templates/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Template_template_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/templates/{uuid}', ['uuid' => $uuid]));
    }

    public function regenerateSimpleJson(string $uuid): \Easymailing\Sdk\Generated\Dto\Template_template_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/templates/{uuid}/actions/regenerate_simple_json', ['uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Template_template_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Template_TemplateSendTestInput_template_write_send_test $body
     * @return array<string, mixed>
     */
    public function sendTest(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Template_TemplateSendTestInput_template_write_send_test $body): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/templates/{uuid}/actions/send_test', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

}
