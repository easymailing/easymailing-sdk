<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailSendsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_sends', []), query: $query, pathTemplate: '/email_sends');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read => \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read::fromArray($item));
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_sends/{uuid}', ['uuid' => $uuid]), pathTemplate: '/email_sends/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read::fromArray($data);
    }

    public function cancel(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sends/{uuid}/actions/cancel', ['uuid' => $uuid]), pathTemplate: '/email_sends/{uuid}/actions/cancel');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read::fromArray($data);
    }

    public function cancelAll(): \Easymailing\Sdk\Generated\Dto\EmailSendCancellation_email_send_cancellation_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sends/actions/cancel_all', []), pathTemplate: '/email_sends/actions/cancel_all');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSendCancellation_email_send_cancellation_read::fromArray($data);
    }

    public function discard(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sends/{uuid}/actions/discard', ['uuid' => $uuid]), pathTemplate: '/email_sends/{uuid}/actions/discard');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read::fromArray($data);
    }

    public function reopen(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSendReopening_email_send_reopening_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/email_sends/{uuid}/actions/reopen', ['uuid' => $uuid]), pathTemplate: '/email_sends/{uuid}/actions/reopen');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSendReopening_email_send_reopening_read::fromArray($data);
    }

    public function retry(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sends/{uuid}/actions/retry', ['uuid' => $uuid]), pathTemplate: '/email_sends/{uuid}/actions/retry');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailSend_EmailScheduleInput $body
     */
    public function schedule(array|\Easymailing\Sdk\Generated\Dto\EmailSend_EmailScheduleInput $body): \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/email_sends/actions/schedule', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_sends/actions/schedule');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailSend_EmailSendInput $body
     */
    public function send(array|\Easymailing\Sdk\Generated\Dto\EmailSend_EmailSendInput $body): \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/email_sends/actions/send', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_sends/actions/send');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read::fromArray($data);
    }

    public function sendNow(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sends/{uuid}/actions/send_now', ['uuid' => $uuid]), pathTemplate: '/email_sends/{uuid}/actions/send_now');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSend_email_send_read::fromArray($data);
    }

}
