---
"@easymailing/sdk": minor
---

Add the CRM and Sales resources of the public API: contacts (with audience memberships and tags), companies (with industries), contact and company attributes, opportunities, pipelines (with stages, loss reasons and templates), opportunity attributes, tasks (with assignees) and notes.

Remove the schema-only resources `ListSegmentConditions`, `MemberCampaignDeliveredEvents` and `MemberSms*Events`: their `get()` always answered 404 because those paths only documented webhook and condition schemas, and the API no longer publishes them.

Input properties follow the documented `snake_case` names of the public API: `operatorMatch` becomes `operator_match`, `groupUuid` becomes `group_uuid` and `segmentUuid` becomes `segment_uuid`. The API still accepts the former names, but code typed against the previous SDK must use the new ones. Custom field options take `translations` instead of `label`, and `automation_trigger` is required when starting an automation through the API, as the API already demanded.
