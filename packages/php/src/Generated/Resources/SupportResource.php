<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class SupportResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\SupportTicket_support_ticket_read>
     */
    public function listTickets(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/support/tickets', []), query: $query, pathTemplate: '/support/tickets');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\SupportTicket_support_ticket_read => \Easymailing\Sdk\Generated\Dto\SupportTicket_support_ticket_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SupportTicket_SupportTicketInput $body
     */
    public function createTickets(array|\Easymailing\Sdk\Generated\Dto\SupportTicket_SupportTicketInput $body): \Easymailing\Sdk\Generated\Dto\SupportTicket_support_ticket_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/support/tickets', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/support/tickets');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SupportTicket_support_ticket_read::fromArray($data);
    }

}
