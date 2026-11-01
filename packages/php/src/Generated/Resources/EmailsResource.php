<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Email_email_list>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/emails', []), query: $query, pathTemplate: '/emails');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Email_email_list => \Easymailing\Sdk\Generated\Dto\Email_email_list::fromArray($item));
    }

    public function get(string $uuid, ?string $contact = null, ?string $company = null, ?string $opportunity = null): \Easymailing\Sdk\Generated\Dto\Email_email_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/emails/{uuid}', ['uuid' => $uuid]), query: array_filter(['contact' => $contact, 'company' => $company, 'opportunity' => $opportunity], static fn($value): bool => $value !== null), pathTemplate: '/emails/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Email_email_read::fromArray($data);
    }

    public function getAccessGrants(string $uuid, ?string $contact = null, ?string $company = null, ?string $opportunity = null): \Easymailing\Sdk\Generated\Dto\EmailAccessGrants_email_access_grants_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/emails/{uuid}/access_grants', ['uuid' => $uuid]), query: array_filter(['contact' => $contact, 'company' => $company, 'opportunity' => $opportunity], static fn($value): bool => $value !== null), pathTemplate: '/emails/{uuid}/access_grants');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailAccessGrants_email_access_grants_read::fromArray($data);
    }

    public function getInlineImages(string $uuid, ?string $contact = null, ?string $company = null, ?string $opportunity = null): \Easymailing\Sdk\Generated\Dto\EmailInlineImages_email_inline_images_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/emails/{uuid}/inline_images', ['uuid' => $uuid]), query: array_filter(['contact' => $contact, 'company' => $company, 'opportunity' => $opportunity], static fn($value): bool => $value !== null), pathTemplate: '/emails/{uuid}/inline_images');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailInlineImages_email_inline_images_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailAccessGrants_EmailAccessGrantsInput $body
     */
    public function updateAccessGrants(string $uuid, array|\Easymailing\Sdk\Generated\Dto\EmailAccessGrants_EmailAccessGrantsInput $body, ?string $contact = null, ?string $company = null, ?string $opportunity = null): \Easymailing\Sdk\Generated\Dto\EmailAccessGrants_email_access_grants_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/emails/{uuid}/access_grants', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), query: array_filter(['contact' => $contact, 'company' => $company, 'opportunity' => $opportunity], static fn($value): bool => $value !== null), pathTemplate: '/emails/{uuid}/access_grants');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailAccessGrants_email_access_grants_read::fromArray($data);
    }

}
