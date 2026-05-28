<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class SmsCampaignsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\SmsCampaign_campaign_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/sms_campaigns', []), query: $query, pathTemplate: '/sms_campaigns');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\SmsCampaign_campaign_read => \Easymailing\Sdk\Generated\Dto\SmsCampaign_campaign_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SmsCampaign_CampaignSmsInput_campaign_write_sms $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\SmsCampaign_CampaignSmsInput_campaign_write_sms $body): \Easymailing\Sdk\Generated\Dto\SmsCampaign_campaign_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/sms_campaigns', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/sms_campaigns');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SmsCampaign_campaign_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\SmsCampaign_campaign_read_campaign_read_detail
    {
        $result = $this->client->request('GET', $this->resolvePath('/sms_campaigns/{uuid}', ['uuid' => $uuid]), pathTemplate: '/sms_campaigns/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SmsCampaign_campaign_read_campaign_read_detail::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SmsCampaign_CampaignSmsInput_campaign_write_sms $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\SmsCampaign_CampaignSmsInput_campaign_write_sms $body): \Easymailing\Sdk\Generated\Dto\SmsCampaign_campaign_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/sms_campaigns/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/sms_campaigns/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SmsCampaign_campaign_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/sms_campaigns/{uuid}', ['uuid' => $uuid]), pathTemplate: '/sms_campaigns/{uuid}');
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SmsCampaign_CampaignDuplicateInput_campaign_write_duplicate $body
     */
    public function duplicate(string $uuid, array|\Easymailing\Sdk\Generated\Dto\SmsCampaign_CampaignDuplicateInput_campaign_write_duplicate $body): \Easymailing\Sdk\Generated\Dto\SmsCampaign_campaign_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/sms_campaigns/{uuid}/actions/duplicate', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/sms_campaigns/{uuid}/actions/duplicate');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SmsCampaign_campaign_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SmsCampaign_CampaignSendInput_campaign_write_schedule $body
     * @return array<string, mixed>
     */
    public function schedule(string $uuid, array|\Easymailing\Sdk\Generated\Dto\SmsCampaign_CampaignSendInput_campaign_write_schedule $body): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/sms_campaigns/{uuid}/actions/schedule', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/sms_campaigns/{uuid}/actions/schedule');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SmsCampaign_CampaignSendInput_campaign_write_send $body
     * @return array<string, mixed>
     */
    public function sendNow(string $uuid, array|\Easymailing\Sdk\Generated\Dto\SmsCampaign_CampaignSendInput_campaign_write_send $body): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/sms_campaigns/{uuid}/actions/send_now', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/sms_campaigns/{uuid}/actions/send_now');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SmsCampaign_CampaignSendSmsTestInput_campaign_write_send_sms_test $body
     * @return array<string, mixed>
     */
    public function sendTest(string $uuid, array|\Easymailing\Sdk\Generated\Dto\SmsCampaign_CampaignSendSmsTestInput_campaign_write_send_sms_test $body): array
    {
        $result = $this->client->request('PUT', $this->resolvePath('/sms_campaigns/{uuid}/actions/send_test', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/sms_campaigns/{uuid}/actions/send_test');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

}
