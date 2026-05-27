import { ApiError } from "./ApiError.js";

/** 5xx — server-side failure. Retriable on idempotent methods. */
export class ServerError extends ApiError {}
