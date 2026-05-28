<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class SenderDomainsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\SenderDomain_sender_domain_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/sender_domains', []), query: $query, pathTemplate: '/sender_domains');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\SenderDomain_sender_domain_read => \Easymailing\Sdk\Generated\Dto\SenderDomain_sender_domain_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SenderDomain_sender_domain_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\SenderDomain_sender_domain_write $body): \Easymailing\Sdk\Generated\Dto\SenderDomain_sender_domain_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/sender_domains', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/sender_domains');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SenderDomain_sender_domain_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\SenderDomain_sender_domain_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/sender_domains/{uuid}', ['uuid' => $uuid]), pathTemplate: '/sender_domains/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SenderDomain_sender_domain_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/sender_domains/{uuid}', ['uuid' => $uuid]), pathTemplate: '/sender_domains/{uuid}');
    }

    public function authenticate(string $uuid): \Easymailing\Sdk\Generated\Dto\SenderDomain_SenderDomainAuthenticateOutput_sender_domain_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/sender_domains/{uuid}/actions/authenticate', ['uuid' => $uuid]), pathTemplate: '/sender_domains/{uuid}/actions/authenticate');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SenderDomain_SenderDomainAuthenticateOutput_sender_domain_read::fromArray($data);
    }

    /**
     * @return array<string, mixed>
     */
    public function resendVerification(string $uuid): array
    {
        $result = $this->client->request('POST', $this->resolvePath('/sender_domains/{uuid}/actions/resend_verification', ['uuid' => $uuid]), pathTemplate: '/sender_domains/{uuid}/actions/resend_verification');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

}
