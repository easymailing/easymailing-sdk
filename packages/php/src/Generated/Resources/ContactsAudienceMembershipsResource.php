<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class ContactsAudienceMembershipsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\ContactAudienceMembership_contact_audience_membership_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/contacts/{contactUuid}/audience_memberships', ['contactUuid' => $this->boundParams['contactUuid'] ?? null]), query: $query, pathTemplate: '/contacts/{contactUuid}/audience_memberships');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\ContactAudienceMembership_contact_audience_membership_read => \Easymailing\Sdk\Generated\Dto\ContactAudienceMembership_contact_audience_membership_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ContactAudienceMembership_ContactMembershipChannelsInput $body
     */
    public function update(string $audienceUuid, array|\Easymailing\Sdk\Generated\Dto\ContactAudienceMembership_ContactMembershipChannelsInput $body, ?bool $disableDoubleOptIn = null, ?bool $disableWelcomeEmail = null, ?bool $disableSmsDoubleOptIn = null): \Easymailing\Sdk\Generated\Dto\ContactAudienceMembership_contact_audience_membership_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/contacts/{contactUuid}/audience_memberships/{audienceUuid}', ['contactUuid' => $this->boundParams['contactUuid'] ?? null, 'audienceUuid' => $audienceUuid]), body: is_array($body) ? $body : $body->toArray(), query: array_filter(['disable_double_opt_in' => $disableDoubleOptIn, 'disable_welcome_email' => $disableWelcomeEmail, 'disable_sms_double_opt_in' => $disableSmsDoubleOptIn], static fn($value): bool => $value !== null), pathTemplate: '/contacts/{contactUuid}/audience_memberships/{audienceUuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ContactAudienceMembership_contact_audience_membership_read::fromArray($data);
    }

    public function delete(string $audienceUuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/contacts/{contactUuid}/audience_memberships/{audienceUuid}', ['contactUuid' => $this->boundParams['contactUuid'] ?? null, 'audienceUuid' => $audienceUuid]), pathTemplate: '/contacts/{contactUuid}/audience_memberships/{audienceUuid}');
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ContactAudienceMembership_ContactMembershipChannelsInput_unsubscribe_contact_from_audience $body
     */
    public function unsubscribe(string $audienceUuid, array|\Easymailing\Sdk\Generated\Dto\ContactAudienceMembership_ContactMembershipChannelsInput_unsubscribe_contact_from_audience $body): \Easymailing\Sdk\Generated\Dto\ContactAudienceMembership_contact_audience_membership_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/contacts/{contactUuid}/audience_memberships/{audienceUuid}/actions/unsubscribe', ['contactUuid' => $this->boundParams['contactUuid'] ?? null, 'audienceUuid' => $audienceUuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/contacts/{contactUuid}/audience_memberships/{audienceUuid}/actions/unsubscribe');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ContactAudienceMembership_contact_audience_membership_read::fromArray($data);
    }

}
