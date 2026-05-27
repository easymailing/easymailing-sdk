import type { TransportRequest, TransportResponse } from "./types.js";

export interface Transport {
  send(request: TransportRequest): Promise<TransportResponse>;
}
