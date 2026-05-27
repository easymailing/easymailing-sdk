<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Hydra;

final class CollectionParser
{
    /**
     * @param array<string, mixed> $input
     * @return array{data: list<array<string, mixed>>, total: int, page: int, hasMore: bool, raw: array<string, mixed>}
     */
    public static function parse(array $input): array
    {
        $members = is_array($input['hydra:member'] ?? null) ? $input['hydra:member'] : [];
        $data = array_map(
            static fn(array $m): array => EntityParser::parse($m),
            $members,
        );
        $total = is_int($input['hydra:totalItems'] ?? null)
            ? $input['hydra:totalItems']
            : count($data);

        $view = is_array($input['hydra:view'] ?? null) ? $input['hydra:view'] : [];
        $page = self::parsePageFromView($view);
        $hasMore = is_string($view['hydra:next'] ?? null);

        return [
            'data' => $data,
            'total' => $total,
            'page' => $page,
            'hasMore' => $hasMore,
            'raw' => $input,
        ];
    }

    /** @param array<string, mixed> $view */
    private static function parsePageFromView(array $view): int
    {
        $id = $view['@id'] ?? null;
        if (!is_string($id)) {
            return 1;
        }
        if (preg_match('/[?&]page=(\d+)/', $id, $m) === 1) {
            return (int) $m[1];
        }
        return 1;
    }
}
