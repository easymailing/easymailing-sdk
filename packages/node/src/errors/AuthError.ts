import { ApiError } from "./ApiError.js";

/** 401 / 403 — authentication or authorization failed. */
export class AuthError extends ApiError {}
