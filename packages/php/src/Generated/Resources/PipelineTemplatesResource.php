<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class PipelineTemplatesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\PipelineTemplate_pipeline_template_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/pipeline_templates', []), query: $query, pathTemplate: '/pipeline_templates');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\PipelineTemplate_pipeline_template_read => \Easymailing\Sdk\Generated\Dto\PipelineTemplate_pipeline_template_read::fromArray($item));
    }

}
