<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AudiencesSubscriptionFormsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/suscription_forms', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), query: $query, pathTemplate: '/audiences/{audienceUuid}/suscription_forms');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read => \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read::fromArray($item));
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/suscription_forms/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/suscription_forms/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/audiences/{audienceUuid}/suscription_forms/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/suscription_forms/{uuid}');
    }

    public function pause(string $uuid): \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/pause', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/pause');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read::fromArray($data);
    }

    public function publish(string $uuid): \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/publish', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/publish');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read::fromArray($data);
    }

    public function resume(string $uuid): \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/resume', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/resume');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read::fromArray($data);
    }

    public function unpublish(string $uuid): \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/unpublish', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/unpublish');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SuscriptionForm_CreateEmbeddedFormDto_suscription_form_write $body
     */
    public function createEmbedded(array|\Easymailing\Sdk\Generated\Dto\SuscriptionForm_CreateEmbeddedFormDto_suscription_form_write $body): \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/suscription_forms/embedded', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/suscription_forms/embedded');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SuscriptionForm_CreatePopupFormDto_suscription_form_write $body
     */
    public function createPopup(array|\Easymailing\Sdk\Generated\Dto\SuscriptionForm_CreatePopupFormDto_suscription_form_write $body): \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/suscription_forms/popup', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/suscription_forms/popup');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read::fromArray($data);
    }

    public function getPublishingInfo(string $uuid): \Easymailing\Sdk\Generated\Dto\SuscriptionForm_PublishingInfoDto_suscription_form_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/suscription_forms/{uuid}/publishing_info', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/suscription_forms/{uuid}/publishing_info');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SuscriptionForm_PublishingInfoDto_suscription_form_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SuscriptionForm_UpdateEmbeddedFormDto_suscription_form_write $body
     */
    public function updateEmbedded(string $uuid, array|\Easymailing\Sdk\Generated\Dto\SuscriptionForm_UpdateEmbeddedFormDto_suscription_form_write $body): \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/suscription_forms/{uuid}/embedded', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/suscription_forms/{uuid}/embedded');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SuscriptionForm_UpdatePopupFormDto_suscription_form_write $body
     */
    public function updatePopup(string $uuid, array|\Easymailing\Sdk\Generated\Dto\SuscriptionForm_UpdatePopupFormDto_suscription_form_write $body): \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/suscription_forms/{uuid}/popup', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/suscription_forms/{uuid}/popup');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SuscriptionForm_suscription_form_read::fromArray($data);
    }

}
