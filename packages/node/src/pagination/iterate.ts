import type { Page } from "./Page.js";

/**
 * Build an async iterator that walks all pages of a collection.
 *
 * Caller provides `fetchPage(page)` which must return a `Page<T>`. The iterator
 * yields each item across pages and stops when `hasMore` is false.
 */
export function createPageIterator<T>(
  fetchPage: (page: number) => Promise<Page<T>>,
): AsyncIterable<T> {
  return {
    async *[Symbol.asyncIterator]() {
      let page = 1;
      while (true) {
        const current = await fetchPage(page);
        for (const item of current.data) {
          yield item;
        }
        if (!current.hasMore) return;
        page += 1;
      }
    },
  };
}
