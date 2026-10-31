---
"@easymailing/sdk": minor
---

Add the CRM and Sales resources of the public API: contacts (with audience memberships and tags), companies (with industries), contact and company attributes, opportunities, pipelines (with stages, loss reasons and templates), opportunity attributes, tasks (with assignees) and notes.

Remove the schema-only resources `ListSegmentConditions`, `MemberCampaignDeliveredEvents` and `MemberSms*Events`: their `get()` always answered 404 because those paths only documented webhook and condition schemas, and the API no longer publishes them.
