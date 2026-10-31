<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class CompaniesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Company_company_list>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/companies', []), query: $query, pathTemplate: '/companies');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Company_company_list => \Easymailing\Sdk\Generated\Dto\Company_company_list::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Company_CompanyCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Company_CompanyCreateInput $body): \Easymailing\Sdk\Generated\Dto\Company_company_list_company_detail
    {
        $result = $this->client->request('POST', $this->resolvePath('/companies', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/companies');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Company_company_list_company_detail::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Company_company_list_company_detail
    {
        $result = $this->client->request('GET', $this->resolvePath('/companies/{uuid}', ['uuid' => $uuid]), pathTemplate: '/companies/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Company_company_list_company_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Company_CompanyUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Company_CompanyUpdateInput $body): \Easymailing\Sdk\Generated\Dto\Company_company_list_company_detail
    {
        $result = $this->client->request('PUT', $this->resolvePath('/companies/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/companies/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Company_company_list_company_detail::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/companies/{uuid}', ['uuid' => $uuid]), pathTemplate: '/companies/{uuid}');
    }

}
