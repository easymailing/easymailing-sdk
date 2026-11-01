<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailSequencesAssetsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    public function update(string $assetUuid): \Easymailing\Sdk\Generated\Dto\EmailSequenceAsset_email_sequence_asset_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_sequences/{uuid}/assets/{assetUuid}', ['uuid' => $this->boundParams['uuid'] ?? null, 'assetUuid' => $assetUuid]), pathTemplate: '/email_sequences/{uuid}/assets/{assetUuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSequenceAsset_email_sequence_asset_read::fromArray($data);
    }

}
