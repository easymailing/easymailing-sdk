---
"@easymailing/sdk": minor
---

Add the customer relationship and contact segment resources of the public API: CRM emails (with attachments, inline images and access grants), email drafts, sends and batches, composing helpers, opt-outs, email sequences (with versions, enrollments, activity and assets), meetings, booking pages (with calendars, fields, offers, images, email designs and sharing), record files and activity, plus contact segments, the contact filter catalog and contact queries (`count_contacts` and `search_contacts`).

Webhooks gain a `scope` (`marketing` by default, or `crm`); a `crm` webhook has no audience, so `audience` is now `null` in its responses. Support ticket comments report `author_id` as the Easymailing user id of the requester, or `null` for the support team, once the support portal tickets are enabled.
