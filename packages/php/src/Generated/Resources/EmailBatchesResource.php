<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailBatchesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailBatch_email_batch_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_batches/{uuid}', ['uuid' => $uuid]), pathTemplate: '/email_batches/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailBatch_email_batch_read::fromArray($data);
    }

    public function cancel(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailBatch_email_batch_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_batches/{uuid}/actions/cancel', ['uuid' => $uuid]), pathTemplate: '/email_batches/{uuid}/actions/cancel');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailBatch_email_batch_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailBatch_EmailBatchScheduleInput $body
     */
    public function schedule(array|\Easymailing\Sdk\Generated\Dto\EmailBatch_EmailBatchScheduleInput $body): \Easymailing\Sdk\Generated\Dto\EmailBatch_email_batch_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/email_batches/actions/schedule', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_batches/actions/schedule');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailBatch_email_batch_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailBatch_EmailBatchSendInput $body
     */
    public function send(array|\Easymailing\Sdk\Generated\Dto\EmailBatch_EmailBatchSendInput $body): \Easymailing\Sdk\Generated\Dto\EmailBatch_email_batch_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/email_batches/actions/send', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_batches/actions/send');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailBatch_email_batch_read::fromArray($data);
    }

    public function sendNow(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailBatch_email_batch_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_batches/{uuid}/actions/send_now', ['uuid' => $uuid]), pathTemplate: '/email_batches/{uuid}/actions/send_now');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailBatch_email_batch_read::fromArray($data);
    }

}
