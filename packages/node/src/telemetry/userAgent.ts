/**
 * Build the SDK's User-Agent header value. Identifies the SDK and runtime
 * without leaking sensitive info.
 */
export function buildUserAgent(version: string): string {
  const runtime = `node/${process.versions.node}`;
  const platform = process.platform;
  return `easymailing-sdk/${version} (${runtime}; ${platform})`;
}
