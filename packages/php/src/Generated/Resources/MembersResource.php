<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class MembersResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @return Page<\Easymailing\Sdk\Generated\Dto\Member_member_read>
     */
    public function search(?string $email = null, ?string $status = null, ?string $phone = null, ?string $smsStatus = null, ?string $emailOptInSource = null, ?string $smsOptInSource = null, ?string $source = null, ?string $groups = null, ?string $suscriptionForm = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/members/search', []), query: array_filter(['email' => $email, 'status' => $status, 'phone' => $phone, 'sms_status' => $smsStatus, 'email_opt_in_source' => $emailOptInSource, 'sms_opt_in_source' => $smsOptInSource, 'source' => $source, 'groups' => $groups, 'suscriptionForm' => $suscriptionForm], static fn($value): bool => $value !== null), pathTemplate: '/members/search');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Member_member_read => \Easymailing\Sdk\Generated\Dto\Member_member_read::fromArray($item));
    }

}
