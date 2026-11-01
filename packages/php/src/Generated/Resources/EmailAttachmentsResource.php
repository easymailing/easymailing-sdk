<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailAttachmentsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    public function update(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailAttachment_email_attachment_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_attachments/{uuid}', ['uuid' => $uuid]), pathTemplate: '/email_attachments/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailAttachment_email_attachment_read::fromArray($data);
    }

}
