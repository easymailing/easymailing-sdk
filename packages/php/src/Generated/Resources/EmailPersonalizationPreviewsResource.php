<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailPersonalizationPreviewsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailPersonalizationPreview_EmailPersonalizationPreviewInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\EmailPersonalizationPreview_EmailPersonalizationPreviewInput $body): \Easymailing\Sdk\Generated\Dto\EmailPersonalizationPreview_email_personalization_preview_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/email_personalization_previews', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_personalization_previews');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailPersonalizationPreview_email_personalization_preview_read::fromArray($data);
    }

}
