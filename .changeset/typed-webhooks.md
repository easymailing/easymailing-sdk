---
"@easymailing/sdk": patch
---

Add `TypedWebhookEvent` discriminated union and `KnownEventType` literal type generated from the upstream `WebhookEventType` catalogue. Default `parseWebhookEvent(payload)` calls now narrow to `TypedWebhookEvent`; pass an explicit `T` to keep the previous loose `WebhookEventBase<T>` behavior. `KnownEventTypeMap` is exported so future patches can tighten `data` per event_type. No runtime behavior changes.
