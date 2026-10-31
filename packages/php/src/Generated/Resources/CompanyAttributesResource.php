<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class CompanyAttributesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/company_attributes', []), query: $query, pathTemplate: '/company_attributes');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read => \Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\CompanyAttribute_CompanyAttributeCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\CompanyAttribute_CompanyAttributeCreateInput $body): \Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/company_attributes', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/company_attributes');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/company_attributes/{uuid}', ['uuid' => $uuid]), pathTemplate: '/company_attributes/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\CompanyAttribute_CompanyAttributeUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\CompanyAttribute_CompanyAttributeUpdateInput $body): \Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/company_attributes/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/company_attributes/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\CompanyAttribute_CompanyAttributeVersionInput $body
     */
    public function archive(string $uuid, array|\Easymailing\Sdk\Generated\Dto\CompanyAttribute_CompanyAttributeVersionInput $body): \Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/company_attributes/{uuid}/actions/archive', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/company_attributes/{uuid}/actions/archive');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\CompanyAttribute_CompanyAttributeVersionInput $body
     */
    public function restore(string $uuid, array|\Easymailing\Sdk\Generated\Dto\CompanyAttribute_CompanyAttributeVersionInput $body): \Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/company_attributes/{uuid}/actions/restore', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/company_attributes/{uuid}/actions/restore');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\CompanyAttribute_company_attribute_read::fromArray($data);
    }

}
