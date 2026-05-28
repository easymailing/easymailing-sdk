<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Telemetry;

/**
 * Internal helper that invokes the user-supplied onEvent callable with
 * full safety: a throwing handler can never break the API call.
 */
final class EventDispatcher
{
    /**
     * @param (callable(SdkEvent): void)|null $onEvent
     */
    public static function dispatch(SdkEvent $event, ?callable $onEvent): void
    {
        if ($onEvent === null) {
            return;
        }
        try {
            $onEvent($event);
        } catch (\Throwable $err) {
            try {
                error_log('[easymailing] onEvent handler threw: ' . $err->getMessage());
            } catch (\Throwable) {
                // Last-resort — never throw from telemetry.
            }
        }
    }
}
