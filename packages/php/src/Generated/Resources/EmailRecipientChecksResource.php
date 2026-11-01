<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailRecipientChecksResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailRecipientCheck_EmailRecipientCheckInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\EmailRecipientCheck_EmailRecipientCheckInput $body): \Easymailing\Sdk\Generated\Dto\EmailRecipientCheck_email_recipient_check_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/email_recipient_checks', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_recipient_checks');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailRecipientCheck_email_recipient_check_read::fromArray($data);
    }

}
