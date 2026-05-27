/**
 * Abstract root of the SDK error hierarchy. Always extends native Error so that
 * `error instanceof Error` is true everywhere.
 */
export abstract class EasymailingError extends Error {
  constructor(message: string, options?: ErrorOptions) {
    super(message, options);
    this.name = new.target.name;
  }
}
