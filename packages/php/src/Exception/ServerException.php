<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Exception;

/** 5xx — server-side failure. Retriable on idempotent methods. */
class ServerException extends ApiException
{
}
