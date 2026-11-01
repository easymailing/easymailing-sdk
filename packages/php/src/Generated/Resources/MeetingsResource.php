<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class MeetingsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Meeting_meeting_list>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/meetings', []), query: $query, pathTemplate: '/meetings');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Meeting_meeting_list => \Easymailing\Sdk\Generated\Dto\Meeting_meeting_list::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_MeetingCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_MeetingCreateInput $body): \Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_meeting_write_receipt_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/meetings', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/meetings');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_meeting_write_receipt_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Meeting_meeting_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/meetings/{uuid}', ['uuid' => $uuid]), pathTemplate: '/meetings/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Meeting_meeting_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_MeetingUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_MeetingUpdateInput $body): \Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_meeting_write_receipt_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/meetings/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/meetings/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_meeting_write_receipt_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_MeetingCancelInput $body
     */
    public function cancel(string $uuid, array|\Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_MeetingCancelInput $body): \Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_meeting_write_receipt_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/meetings/{uuid}/actions/cancel', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/meetings/{uuid}/actions/cancel');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\MeetingWriteReceipt_meeting_write_receipt_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Meeting_MeetingRelationsInput $body
     */
    public function updateRelations(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Meeting_MeetingRelationsInput $body): \Easymailing\Sdk\Generated\Dto\Meeting_meeting_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/meetings/{uuid}/relations', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/meetings/{uuid}/relations');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Meeting_meeting_read::fromArray($data);
    }

}
