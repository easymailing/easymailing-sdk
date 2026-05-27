/**
 * Mock Transport for tests. Accepts a queue of programmed responses.
 * Each .send() pops the next response from the queue.
 */
export function createMockTransport() {
  const queue = [];
  const received = [];

  return {
    enqueue(response) {
      queue.push(response);
    },
    received,
    async send(request) {
      received.push(request);
      const next = queue.shift();
      if (!next) {
        throw new Error("Mock transport queue exhausted");
      }
      if (next instanceof Error) {
        throw next;
      }
      return {
        status: next.status ?? 200,
        headers: next.headers ?? {},
        body: typeof next.body === "string" ? next.body : JSON.stringify(next.body ?? {}),
      };
    },
  };
}
