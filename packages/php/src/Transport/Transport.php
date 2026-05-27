<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Transport;

/**
 * HTTP transport abstraction. Implementations: CurlTransport (default),
 * Psr18Transport (adapter), WordPressTransport (wp_remote_request wrapper).
 */
interface Transport
{
    public function send(TransportRequest $request): TransportResponse;
}
