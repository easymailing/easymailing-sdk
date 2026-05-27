import type { TransportRequest, TransportResponse } from "../transport/types.js";

export type RequestHook = (req: TransportRequest) => void;
export type ResponseHook = (res: TransportResponse, req: TransportRequest) => void;
