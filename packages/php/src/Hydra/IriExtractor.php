<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Hydra;

final class IriExtractor
{
    /**
     * Extract the last path segment from an IRI as the resource UUID.
     * Returns null for invalid input.
     */
    public static function extract(string $iri): ?string
    {
        if ($iri === '' || !str_starts_with($iri, '/')) {
            return null;
        }
        $segments = array_values(array_filter(explode('/', $iri), static fn(string $s): bool => $s !== ''));
        if (count($segments) === 0) {
            return null;
        }
        return $segments[count($segments) - 1];
    }
}
