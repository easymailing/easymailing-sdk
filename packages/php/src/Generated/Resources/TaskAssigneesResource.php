<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class TaskAssigneesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\TaskAssignee_task_assignee_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/task_assignees', []), query: $query, pathTemplate: '/task_assignees');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\TaskAssignee_task_assignee_read => \Easymailing\Sdk\Generated\Dto\TaskAssignee_task_assignee_read::fromArray($item));
    }

}
