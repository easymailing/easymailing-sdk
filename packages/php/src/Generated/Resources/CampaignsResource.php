<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class CampaignsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Campaign_campaign_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/campaigns', []), query: $query, pathTemplate: '/campaigns');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read => \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Campaign_campaign_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Campaign_campaign_write $body): \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/campaigns', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/campaigns');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read_campaign_read_detail
    {
        $result = $this->client->request('GET', $this->resolvePath('/campaigns/{uuid}', ['uuid' => $uuid]), pathTemplate: '/campaigns/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read_campaign_read_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Campaign_campaign_write $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Campaign_campaign_write $body): \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/campaigns/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/campaigns/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/campaigns/{uuid}', ['uuid' => $uuid]), pathTemplate: '/campaigns/{uuid}');
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignDuplicateInput_campaign_write_duplicate $body
     */
    public function duplicate(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignDuplicateInput_campaign_write_duplicate $body): \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/campaigns/{uuid}/actions/duplicate', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/campaigns/{uuid}/actions/duplicate');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignSendInput_campaign_write_schedule $body
     * @return array<string, mixed>
     */
    public function schedule(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignSendInput_campaign_write_schedule $body): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/campaigns/{uuid}/actions/schedule', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/campaigns/{uuid}/actions/schedule');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignSendInput_campaign_write_send $body
     * @return array<string, mixed>
     */
    public function sendNow(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignSendInput_campaign_write_send $body): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/campaigns/{uuid}/actions/send_now', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/campaigns/{uuid}/actions/send_now');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignSendTestInput_campaign_write_send_test $body
     * @return array<string, mixed>
     */
    public function sendTest(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignSendTestInput_campaign_write_send_test $body): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/campaigns/{uuid}/actions/send_test', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/campaigns/{uuid}/actions/send_test');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignRevalidationInput_campaign_write $body
     */
    public function createRevalidation(array|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignRevalidationInput_campaign_write $body): \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/campaigns/revalidation', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/campaigns/revalidation');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignTestABSenderInput_campaign_write_test_ab_sender $body
     */
    public function createTestAbSender(array|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignTestABSenderInput_campaign_write_test_ab_sender $body): \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/campaigns/test_ab/sender', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/campaigns/test_ab/sender');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignTestABSubjectInput_campaign_write_test_ab_subject $body
     */
    public function createTestAbSubject(array|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignTestABSubjectInput_campaign_write_test_ab_subject $body): \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/campaigns/test_ab/subject', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/campaigns/test_ab/subject');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignTestABTemplateInput_campaign_write_test_ab_template $body
     */
    public function createTestAbTemplate(array|\Easymailing\Sdk\Generated\Dto\Campaign_CampaignTestABTemplateInput_campaign_write_test_ab_template $body): \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/campaigns/test_ab/template', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/campaigns/test_ab/template');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Campaign_campaign_read::fromArray($data);
    }

}
