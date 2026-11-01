<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class BookingPagesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/booking_pages', []), query: $query, pathTemplate: '/booking_pages');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read => \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\BookingPage_BookingPageCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\BookingPage_BookingPageCreateInput $body): \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/booking_pages', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/booking_pages');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/booking_pages/{uuid}', ['uuid' => $uuid]), pathTemplate: '/booking_pages/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\BookingPage_BookingPageUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\BookingPage_BookingPageUpdateInput $body): \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/booking_pages/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/booking_pages/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\BookingPage_BookingPageStateInput $body
     */
    public function archive(string $uuid, array|\Easymailing\Sdk\Generated\Dto\BookingPage_BookingPageStateInput $body): \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/booking_pages/{uuid}/actions/archive', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/booking_pages/{uuid}/actions/archive');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\BookingPage_BookingPageStateInput $body
     */
    public function pause(string $uuid, array|\Easymailing\Sdk\Generated\Dto\BookingPage_BookingPageStateInput $body): \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/booking_pages/{uuid}/actions/pause', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/booking_pages/{uuid}/actions/pause');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\BookingPage_BookingPageStateInput $body
     */
    public function publish(string $uuid, array|\Easymailing\Sdk\Generated\Dto\BookingPage_BookingPageStateInput $body): \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/booking_pages/{uuid}/actions/publish', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/booking_pages/{uuid}/actions/publish');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read::fromArray($data);
    }

    public function getAvailability(string $uuid, string $from, string $to, int $duration, string $timeZone): \Easymailing\Sdk\Generated\Dto\BookingPageAvailability_booking_page_availability_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/booking_pages/{uuid}/availability', ['uuid' => $uuid]), query: array_filter(['from' => $from, 'to' => $to, 'duration' => $duration, 'time_zone' => $timeZone], static fn($value): bool => $value !== null), pathTemplate: '/booking_pages/{uuid}/availability');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingPageAvailability_booking_page_availability_read::fromArray($data);
    }

    public function getEmailSettings(string $uuid): \Easymailing\Sdk\Generated\Dto\BookingEmailSettings_booking_email_settings_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/booking_pages/{uuid}/email_settings', ['uuid' => $uuid]), pathTemplate: '/booking_pages/{uuid}/email_settings');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingEmailSettings_booking_email_settings_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\BookingEmailSettings_BookingEmailSettingsInput $body
     */
    public function updateEmailSettings(string $uuid, array|\Easymailing\Sdk\Generated\Dto\BookingEmailSettings_BookingEmailSettingsInput $body): \Easymailing\Sdk\Generated\Dto\BookingEmailSettings_booking_email_settings_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/booking_pages/{uuid}/email_settings', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/booking_pages/{uuid}/email_settings');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingEmailSettings_booking_email_settings_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\BookingPage_BookingPageSharingInput $body
     */
    public function updateSharing(string $uuid, array|\Easymailing\Sdk\Generated\Dto\BookingPage_BookingPageSharingInput $body): \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/booking_pages/{uuid}/sharing', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/booking_pages/{uuid}/sharing');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingPage_booking_page_read::fromArray($data);
    }

}
