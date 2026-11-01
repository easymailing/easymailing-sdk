<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class MeetingWriteReceiptsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_meeting_write_receipt_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/meeting_write_receipts/{uuid}', ['uuid' => $uuid]), pathTemplate: '/meeting_write_receipts/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_meeting_write_receipt_read::fromArray($data);
    }

}
