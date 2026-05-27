<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Pagination;

use Generator;

final class PageIterator
{
    /**
     * Build a Generator that walks all pages of a collection.
     *
     * @template T
     * @param callable(int): Page<T> $fetchPage
     * @return Generator<int, T>
     */
    public static function iterate(callable $fetchPage): Generator
    {
        $page = 1;
        while (true) {
            $current = $fetchPage($page);
            foreach ($current->data as $item) {
                yield $item;
            }
            if (!$current->hasMore) {
                return;
            }
            $page++;
        }
    }
}
