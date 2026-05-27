import { ApiError } from "./ApiError.js";

/** 404 — resource does not exist. */
export class NotFoundError extends ApiError {}
