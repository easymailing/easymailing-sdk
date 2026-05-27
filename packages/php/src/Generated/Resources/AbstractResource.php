<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

class AbstractResource
{
    /**
     * @param array<string, string|null> $params
     */
    protected function resolvePath(string $template, array $params): string
    {
        preg_match_all('/\{([^}]+)\}/', $template, $matches);

        $replacements = [];
        foreach ($matches[1] as $name) {
            $value = $params[$name] ?? null;
            if ($value === null || $value === '') {
                throw new \InvalidArgumentException(sprintf(
                    'Missing path parameter "%s" for path "%s"',
                    $name,
                    $template,
                ));
            }

            $replacements['{' . $name . '}'] = $value;
        }

        return strtr($template, $replacements);
    }

    /**
     * @template T
     * @param array{data: mixed, rateLimit: \Easymailing\Sdk\RateLimit\RateLimitInfo, raw: mixed} $result
     * @param callable(array<string, mixed>): T $map
     * @return Page<T>
     */
    protected function toMappedPage(array $result, callable $map): Page
    {
        $data = $result['data'];
        if (is_array($data) && array_key_exists('data', $data)) {
            $items = [];
            if (is_array($data['data'])) {
                foreach ($data['data'] as $item) {
                    if (is_array($item)) {
                        $items[] = $map($item);
                    }
                }
            }

            return new Page(
                data: $items,
                total: $data['total'] ?? count($data['data']),
                page: $data['page'] ?? 1,
                hasMore: (bool) ($data['hasMore'] ?? false),
                rateLimit: $result['rateLimit'],
                raw: is_array($result['raw']) ? $result['raw'] : [],
            );
        }

        $items = is_array($data) ? [$map($data)] : [];

        return new Page(
            data: $items,
            total: count($items),
            page: 1,
            hasMore: false,
            rateLimit: $result['rateLimit'],
            raw: is_array($result['raw']) ? $result['raw'] : [],
        );
    }

    /**
     * @param array{data: mixed, rateLimit: \Easymailing\Sdk\RateLimit\RateLimitInfo, raw: mixed} $result
     * @return Page<array<string, mixed>>
     */
    protected function toPage(array $result): Page
    {
        $data = $result['data'];
        if (is_array($data) && array_key_exists('data', $data)) {
            $items = [];
            if (is_array($data['data'])) {
                foreach ($data['data'] as $item) {
                    if (is_array($item)) {
                        /** @var array<string, mixed> $item */
                        $items[] = $item;
                    }
                }
            }

            return new Page(
                data: $items,
                total: $data['total'] ?? count($items),
                page: $data['page'] ?? 1,
                hasMore: (bool) ($data['hasMore'] ?? false),
                rateLimit: $result['rateLimit'],
                raw: is_array($result['raw']) ? $result['raw'] : [],
            );
        }

        $items = [];
        if (is_array($data)) {
            /** @var array<string, mixed> $data */
            $items[] = $data;
        }

        return new Page(
            data: $items,
            total: count($items),
            page: 1,
            hasMore: false,
            rateLimit: $result['rateLimit'],
            raw: is_array($result['raw']) ? $result['raw'] : [],
        );
    }
}
