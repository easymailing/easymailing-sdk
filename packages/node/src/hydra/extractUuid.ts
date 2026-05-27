/**
 * Extract the last path segment from an IRI as the resource UUID.
 * Returns null for invalid input.
 */
export function extractUuid(iri: string): string | null {
  if (typeof iri !== "string" || iri === "") return null;
  if (!iri.startsWith("/")) return null;
  const segments = iri.split("/").filter(Boolean);
  if (segments.length === 0) return null;
  const last = segments[segments.length - 1];
  return last ?? null;
}
