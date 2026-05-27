<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Hydra;

final class EntityParser
{
    private const HYDRA_KEYS = ['@id' => true, '@type' => true, '@context' => true];

    /**
     * Strip JSON-LD/Hydra metadata keys from an entity recursively.
     * If `uuid` is absent and `@id` is present, derive uuid from the IRI.
     *
     * @param array<string, mixed> $input
     * @return array<string, mixed>
     */
    public static function parse(array $input): array
    {
        $id = $input['@id'] ?? null;
        $result = [];

        foreach ($input as $key => $value) {
            if (isset(self::HYDRA_KEYS[$key])) {
                continue;
            }
            $result[$key] = self::stripValue($value);
        }

        if (!array_key_exists('uuid', $result) && is_string($id)) {
            $uuid = IriExtractor::extract($id);
            if ($uuid !== null) {
                $result['uuid'] = $uuid;
            }
        }

        return $result;
    }

    private static function stripValue(mixed $value): mixed
    {
        if (is_array($value)) {
            // If the array is associative (looks like an entity), parse it; otherwise map.
            if (self::isAssociative($value)) {
                return self::parse($value);
            }
            return array_map(static fn(mixed $v): mixed => self::stripValue($v), $value);
        }
        return $value;
    }

    /** @param array<int|string, mixed> $arr */
    private static function isAssociative(array $arr): bool
    {
        if ($arr === []) {
            return false;
        }
        foreach (array_keys($arr) as $k) {
            if (!is_int($k)) {
                return true;
            }
        }
        return false;
    }
}
