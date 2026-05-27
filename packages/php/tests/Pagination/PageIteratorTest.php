<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Pagination;

use Easymailing\Sdk\Pagination\Page;
use Easymailing\Sdk\Pagination\PageIterator;
use Easymailing\Sdk\RateLimit\RateLimitInfo;
use PHPUnit\Framework\TestCase;

final class PageIteratorTest extends TestCase
{
    private function emptyRateLimit(): RateLimitInfo
    {
        return new RateLimitInfo(null, null, null, null);
    }

    public function testIteratesAcrossPages(): void
    {
        $pages = [
            new Page([['uuid' => '1'], ['uuid' => '2']], 5, 1, true, $this->emptyRateLimit(), []),
            new Page([['uuid' => '3'], ['uuid' => '4']], 5, 2, true, $this->emptyRateLimit(), []),
            new Page([['uuid' => '5']], 5, 3, false, $this->emptyRateLimit(), []),
        ];
        $collected = [];
        foreach (PageIterator::iterate(fn(int $n) => $pages[$n - 1]) as $item) {
            $collected[] = $item['uuid'];
        }
        self::assertSame(['1', '2', '3', '4', '5'], $collected);
    }

    public function testStopsOnEmptyPage(): void
    {
        $page = new Page([], 0, 1, false, $this->emptyRateLimit(), []);
        $collected = [];
        foreach (PageIterator::iterate(fn() => $page) as $item) {
            $collected[] = $item;
        }
        self::assertCount(0, $collected);
    }

    public function testAdvancesPageNumberSequentially(): void
    {
        $seen = [];
        $fetchPage = function (int $page) use (&$seen): Page {
            $seen[] = $page;
            return new Page(
                [['uuid' => (string) $page]],
                3,
                $page,
                $page < 3,
                $this->emptyRateLimit(),
                [],
            );
        };
        foreach (PageIterator::iterate($fetchPage) as $_) {
            // drain
        }
        self::assertSame([1, 2, 3], $seen);
    }
}
