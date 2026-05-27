<!-- AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND. -->

# PHP Resource Reference

This file lists every generated public SDK resource and method. It is generated from `packages/contract/openapi.json` and `packages/contract/sdk-map.yml`.

Generated resources expose 50 resource groups and 289 non-deprecated API operations.

Deprecated OpenAPI operations are intentionally omitted from the SDK.

## Call Shape

- Top-level collections are readonly properties, e.g. `$em->audiences->list($query)`.
- Collections with item-scoped children are also methods, e.g. `$em->stores('storeResourceId')->orders->list()`.
- Deep nested resources keep the same rule, e.g. `$em->stores('storeResourceId')->products('productResourceId')->variants->list($query)`.
- Request bodies can be plain arrays or generated DTOs. Collection methods return `Page<T>`.
- List filters are passed as one query array. Non-list query filters are named arguments.

## Resource Index

| Resource | Access | Methods | API Path |
|---|---|---:|---|
| [asyncTasks](#asyncTasks) | `$em->asyncTasks` | 2 | `/async_tasks` |
| [audiences](#audiences) | `$em->audiences` | 4 | `/audiences` |
| [audiences.conditionFields](#audiences.conditionFields) | `$em->audiences('audienceUuid')->conditionFields` | 2 | `/audiences/{audienceUuid}/condition_fields` |
| [audiences.groups](#audiences.groups) | `$em->audiences('audienceUuid')->groups` | 10 | `/audiences/{audienceUuid}/groups` |
| [audiences.listFields](#audiences.listFields) | `$em->audiences('audienceUuid')->listFields` | 9 | `/audiences/{audienceUuid}/list_fields` |
| [audiences.listSegments](#audiences.listSegments) | `$em->audiences('audienceUuid')->listSegments` | 10 | `/audiences/{audienceUuid}/list_segments` |
| [audiences.members](#audiences.members) | `$em->audiences('audienceUuid')->members` | 9 | `/audiences/{audienceUuid}/members` |
| [audiences.members.activities](#audiences.members.activities) | `$em->audiences('audienceUuid')->members('memberUuid')->activities` | 1 | `/audiences/{audienceUuid}/members/{memberUuid}/activities` |
| [audiences.mergeTags](#audiences.mergeTags) | `$em->audiences('audienceUuid')->mergeTags` | 1 | `/audiences/{audienceUuid}/merge_tags` |
| [audiences.subscriptionForms](#audiences.subscriptionForms) | `$em->audiences('audienceUuid')->subscriptionForms` | 12 | `/audiences/{audienceUuid}/suscription_forms` |
| [automations](#automations) | `$em->automations` | 7 | `/automations` |
| [automations.automationQueues](#automations.automationQueues) | `$em->automations('automationUuid')->automationQueues` | 3 | `/automations/{automationUuid}/automation_queues` |
| [automations.automationSteps](#automations.automationSteps) | `$em->automations('automationUuid')->automationSteps` | 30 | `/automations/{automationUuid}/automation_steps` |
| [automations.triggers](#automations.triggers) | `$em->automations('automationUuid')->triggers` | 55 | `/automations/{automationUuid}/automation_triggers` |
| [batchOperations](#batchOperations) | `$em->batchOperations` | 6 | `/batch_operations` |
| [campaigns](#campaigns) | `$em->campaigns` | 13 | `/campaigns` |
| [dataManagers](#dataManagers) | `$em->dataManagers` | 5 | `/data_managers` |
| [designSettings](#designSettings) | `$em->designSettings` | 6 | `/design_settings` |
| [invoices](#invoices) | `$em->invoices` | 2 | `/invoices` |
| [listSegmentConditions](#listSegmentConditions) | `$em->listSegmentConditions` | 1 | `/list_segment_conditions` |
| [masterTemplates](#masterTemplates) | `$em->masterTemplates` | 3 | `/master_templates` |
| [memberCampaignDeliveredEvents](#memberCampaignDeliveredEvents) | `$em->memberCampaignDeliveredEvents` | 1 | `/member_campaign_delivered_events` |
| [members](#members) | `$em->members` | 1 | `/members` |
| [memberSmsBouncedEvents](#memberSmsBouncedEvents) | `$em->memberSmsBouncedEvents` | 1 | `/member_sms_bounced_events` |
| [memberSmsClickedEvents](#memberSmsClickedEvents) | `$em->memberSmsClickedEvents` | 1 | `/member_sms_clicked_events` |
| [memberSmsDeliveredEvents](#memberSmsDeliveredEvents) | `$em->memberSmsDeliveredEvents` | 1 | `/member_sms_delivered_events` |
| [memberSmsRepliedEvents](#memberSmsRepliedEvents) | `$em->memberSmsRepliedEvents` | 1 | `/member_sms_replied_events` |
| [memberSmsSubscribedEvents](#memberSmsSubscribedEvents) | `$em->memberSmsSubscribedEvents` | 1 | `/member_sms_subscribed_events` |
| [memberSmsUnsubscribedEvents](#memberSmsUnsubscribedEvents) | `$em->memberSmsUnsubscribedEvents` | 1 | `/member_sms_unsubscribed_events` |
| [mySubscription](#mySubscription) | `$em->mySubscription` | 1 | `/my_suscription` |
| [senderDomains](#senderDomains) | `$em->senderDomains` | 6 | `/sender_domains` |
| [senders](#senders) | `$em->senders` | 5 | `/senders` |
| [smsCampaigns](#smsCampaigns) | `$em->smsCampaigns` | 9 | `/sms_campaigns` |
| [smsSenders](#smsSenders) | `$em->smsSenders` | 4 | `/sms_senders` |
| [stores](#stores) | `$em->stores` | 5 | `/stores` |
| [stores.categories](#stores.categories) | `$em->stores('storeResourceId')->categories` | 5 | `/stores/{storeResourceId}/categories` |
| [stores.customers](#stores.customers) | `$em->stores('storeResourceId')->customers` | 5 | `/stores/{storeResourceId}/customers` |
| [stores.orders](#stores.orders) | `$em->stores('storeResourceId')->orders` | 11 | `/stores/{storeResourceId}/orders` |
| [stores.products](#stores.products) | `$em->stores('storeResourceId')->products` | 5 | `/stores/{storeResourceId}/products` |
| [stores.products.variants](#stores.products.variants) | `$em->stores('storeResourceId')->products('productResourceId')->variants` | 5 | `/stores/{storeResourceId}/products/{productResourceId}/variants` |
| [support](#support) | `$em->support` | 2 | `/support` |
| [templates](#templates) | `$em->templates` | 7 | `/templates` |
| [templatesSchema](#templatesSchema) | `$em->templatesSchema` | 1 | `/templates_schema` |
| [themeIndustries](#themeIndustries) | `$em->themeIndustries` | 1 | `/theme_industries` |
| [themes](#themes) | `$em->themes` | 3 | `/themes` |
| [themeTypes](#themeTypes) | `$em->themeTypes` | 1 | `/theme_types` |
| [treatmentPurposes](#treatmentPurposes) | `$em->treatmentPurposes` | 5 | `/treatment_purposes` |
| [webhookConfigs](#webhookConfigs) | `$em->webhookConfigs` | 5 | `/webhooks` |
| [webhookConfigs.webhookEvents](#webhookConfigs.webhookEvents) | `$em->webhookConfigs('webhookUuid')->webhookEvents` | 2 | `/webhooks/{webhookUuid}/webhook_events` |
| [webhookConfigs.webhookRequests](#webhookConfigs.webhookRequests) | `$em->webhookConfigs('webhookUuid')->webhookRequests` | 2 | `/webhooks/{webhookUuid}/webhook_requests` |

## Methods

### <a id="asyncTasks"></a>`asyncTasks`

- Access: `$em->asyncTasks`
- API path: `/async_tasks`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->asyncTasks->list($query)` | `GET` | `/async_tasks` | page?: int, itemsPerPage?: int | - | `Page<AsyncTask-async_task.read>` | `list_async_tasks` |
| `get` | `$em->asyncTasks->get('uuid')` | `GET` | `/async_tasks/{uuid}` | - | - | `AsyncTask-async_task.read` | `get_async_task` |

### <a id="audiences"></a>`audiences`

- Access: `$em->audiences`
- API path: `/audiences`
- Child resources: `conditionFields`, `groups`, `listFields`, `listSegments`, `members`, `mergeTags`, `subscriptionForms`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->audiences->list($query)` | `GET` | `/audiences` | page?: int, itemsPerPage?: int | - | `Page<Audience-audience.read>` | `list_audiences` |
| `create` | `$em->audiences->create($body)` | `POST` | `/audiences` | - | `Audience-audience.write` | `Audience-audience.read` | `create_audience` |
| `get` | `$em->audiences->get('uuid')` | `GET` | `/audiences/{uuid}` | - | - | `Audience-audience.read` | `get_audience` |
| `update` | `$em->audiences->update('uuid', $body)` | `PUT` | `/audiences/{uuid}` | - | `Audience-audience.write` | `Audience-audience.read` | `update_audience` |

### <a id="audiences.conditionFields"></a>`audiences.conditionFields`

- Access: `$em->audiences('audienceUuid')->conditionFields`
- API path: `/audiences/{audienceUuid}/condition_fields`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->audiences('audienceUuid')->conditionFields->list($query)` | `GET` | `/audiences/{audienceUuid}/condition_fields` | page?: int, itemsPerPage?: int | - | `Page<ConditionField-condition_field.read>` | `list_audience_condition_fields` |
| `get` | `$em->audiences('audienceUuid')->conditionFields->get('uuid')` | `GET` | `/audiences/{audienceUuid}/condition_fields/{uuid}` | - | - | `ConditionField-condition_field.read` | `get_audience_condition_field` |

### <a id="audiences.groups"></a>`audiences.groups`

- Access: `$em->audiences('audienceUuid')->groups`
- API path: `/audiences/{audienceUuid}/groups`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->audiences('audienceUuid')->groups->list($query)` | `GET` | `/audiences/{audienceUuid}/groups` | page?: int, itemsPerPage?: int, title?: string, audience?: string | - | `Page<Group-group.read>` | `list_audience_groups` |
| `create` | `$em->audiences('audienceUuid')->groups->create($body)` | `POST` | `/audiences/{audienceUuid}/groups` | - | `Group-group.write` | `Group-group.read` | `create_audience_group` |
| `get` | `$em->audiences('audienceUuid')->groups->get('uuid')` | `GET` | `/audiences/{audienceUuid}/groups/{uuid}` | - | - | `Group-group.read` | `get_audience_group` |
| `update` | `$em->audiences('audienceUuid')->groups->update('uuid', $body)` | `PUT` | `/audiences/{audienceUuid}/groups/{uuid}` | - | `Group-group.write` | `Group-group.read` | `update_audience_group` |
| `delete` | `$em->audiences('audienceUuid')->groups->delete('uuid')` | `DELETE` | `/audiences/{audienceUuid}/groups/{uuid}` | - | - | `void` | `delete_audience_group` |
| `addFromConditions` | `$em->audiences('audienceUuid')->groups->addFromConditions('uuid')` | `POST` | `/audiences/{audienceUuid}/groups/{uuid}/actions/add_from_conditions` | - | - | `Group.AsyncTaskResource` | `async_task_group_add_from_conditions` |
| `clear` | `$em->audiences('audienceUuid')->groups->clear('uuid')` | `POST` | `/audiences/{audienceUuid}/groups/{uuid}/actions/clear` | - | - | `Group.AsyncTaskResource` | `async_task_group_clear` |
| `export` | `$em->audiences('audienceUuid')->groups->export('uuid')` | `POST` | `/audiences/{audienceUuid}/groups/{uuid}/actions/export` | - | - | `Group.AsyncTaskResource` | `async_task_group_export` |
| `removeFromConditions` | `$em->audiences('audienceUuid')->groups->removeFromConditions('uuid')` | `POST` | `/audiences/{audienceUuid}/groups/{uuid}/actions/remove_from_conditions` | - | - | `Group.AsyncTaskResource` | `async_task_group_remove_from_conditions` |
| `removeFromSegment` | `$em->audiences('audienceUuid')->groups->removeFromSegment('uuid')` | `POST` | `/audiences/{audienceUuid}/groups/{uuid}/actions/remove_from_segment` | - | - | `Group.AsyncTaskResource` | `async_task_group_remove_from_segment` |

### <a id="audiences.listFields"></a>`audiences.listFields`

- Access: `$em->audiences('audienceUuid')->listFields`
- API path: `/audiences/{audienceUuid}/list_fields`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->audiences('audienceUuid')->listFields->list($query)` | `GET` | `/audiences/{audienceUuid}/list_fields` | page?: int, itemsPerPage?: int | - | `Page<ListField-list_field.read>` | `list_audience_custom_fields` |
| `get` | `$em->audiences('audienceUuid')->listFields->get('uuid')` | `GET` | `/audiences/{audienceUuid}/list_fields/{uuid}` | - | - | `ListField-list_field.read` | `get_audience_custom_field` |
| `delete` | `$em->audiences('audienceUuid')->listFields->delete('uuid')` | `DELETE` | `/audiences/{audienceUuid}/list_fields/{uuid}` | - | - | `void` | `delete_custom_field` |
| `createMultiselect` | `$em->audiences('audienceUuid')->listFields->createMultiselect($body)` | `POST` | `/audiences/{audienceUuid}/list_fields/multiselect` | - | `ListField.CustomFieldMultiselect-list_field.write` | `ListField-list_field.read` | `create_custom_field_multiselect` |
| `createSelect` | `$em->audiences('audienceUuid')->listFields->createSelect($body)` | `POST` | `/audiences/{audienceUuid}/list_fields/select` | - | `ListField.CustomFieldSelect-list_field.write` | `ListField-list_field.read` | `create_custom_field_select` |
| `createSimple` | `$em->audiences('audienceUuid')->listFields->createSimple($body)` | `POST` | `/audiences/{audienceUuid}/list_fields/simple` | - | `ListField.CustomFieldSimple-list_field.write` | `ListField-list_field.read` | `create_custom_field_simple` |
| `updateMultiselect` | `$em->audiences('audienceUuid')->listFields->updateMultiselect('uuid', $body)` | `PUT` | `/audiences/{audienceUuid}/list_fields/{uuid}/multiselect` | - | `ListField.CustomFieldMultiselect-list_field.write` | `ListField-list_field.read` | `update_custom_field_multiselect` |
| `updateSelect` | `$em->audiences('audienceUuid')->listFields->updateSelect('uuid', $body)` | `PUT` | `/audiences/{audienceUuid}/list_fields/{uuid}/select` | - | `ListField.CustomFieldSelect-list_field.write` | `ListField-list_field.read` | `update_custom_field_select` |
| `updateSimple` | `$em->audiences('audienceUuid')->listFields->updateSimple('uuid', $body)` | `PUT` | `/audiences/{audienceUuid}/list_fields/{uuid}/simple` | - | `ListField.CustomFieldSimple-list_field.write` | `ListField-list_field.read` | `update_custom_field_simple` |

### <a id="audiences.listSegments"></a>`audiences.listSegments`

- Access: `$em->audiences('audienceUuid')->listSegments`
- API path: `/audiences/{audienceUuid}/list_segments`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->audiences('audienceUuid')->listSegments->list($query)` | `GET` | `/audiences/{audienceUuid}/list_segments` | page?: int, itemsPerPage?: int, name?: string, description?: string, audience?: string | - | `Page<ListSegment-list_segment.read>` | `list_audience_segments` |
| `create` | `$em->audiences('audienceUuid')->listSegments->create($body)` | `POST` | `/audiences/{audienceUuid}/list_segments` | - | `ListSegment-list_segment.write` | `ListSegment-list_segment.read` | `create_audience_segment` |
| `get` | `$em->audiences('audienceUuid')->listSegments->get('uuid')` | `GET` | `/audiences/{audienceUuid}/list_segments/{uuid}` | - | - | `ListSegment-list_segment.read` | `get_audience_segment` |
| `update` | `$em->audiences('audienceUuid')->listSegments->update('uuid', $body)` | `PUT` | `/audiences/{audienceUuid}/list_segments/{uuid}` | - | `ListSegment-list_segment.write` | `ListSegment-list_segment.read` | `update_audience_segment` |
| `delete` | `$em->audiences('audienceUuid')->listSegments->delete('uuid')` | `DELETE` | `/audiences/{audienceUuid}/list_segments/{uuid}` | - | - | `void` | `delete_audience_segment` |
| `addToGroup` | `$em->audiences('audienceUuid')->listSegments->addToGroup('uuid')` | `POST` | `/audiences/{audienceUuid}/list_segments/{uuid}/actions/add_to_group` | - | - | `ListSegment.AsyncTaskResource` | `async_task_segment_add_to_group` |
| `deleteContacts` | `$em->audiences('audienceUuid')->listSegments->deleteContacts('uuid')` | `POST` | `/audiences/{audienceUuid}/list_segments/{uuid}/actions/delete_contacts` | - | - | `ListSegment.AsyncTaskResource` | `async_task_segment_delete_contacts` |
| `export` | `$em->audiences('audienceUuid')->listSegments->export('uuid')` | `POST` | `/audiences/{audienceUuid}/list_segments/{uuid}/actions/export` | - | - | `ListSegment.AsyncTaskResource` | `async_task_segment_export` |
| `removeFromGroup` | `$em->audiences('audienceUuid')->listSegments->removeFromGroup('uuid')` | `POST` | `/audiences/{audienceUuid}/list_segments/{uuid}/actions/remove_from_group` | - | - | `ListSegment.AsyncTaskResource` | `async_task_segment_remove_from_group` |
| `unsubscribe` | `$em->audiences('audienceUuid')->listSegments->unsubscribe('uuid')` | `POST` | `/audiences/{audienceUuid}/list_segments/{uuid}/actions/unsubscribe` | - | - | `ListSegment.AsyncTaskResource` | `async_task_segment_unsubscribe` |

### <a id="audiences.members"></a>`audiences.members`

- Access: `$em->audiences('audienceUuid')->members`
- API path: `/audiences/{audienceUuid}/members`
- Child resources: `activities`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->audiences('audienceUuid')->members->list($query)` | `GET` | `/audiences/{audienceUuid}/members` | page?: int, itemsPerPage?: int, email?: string, status?: string, phone?: string, sms_status?: string, email_opt_in_source?: string, sms_opt_in_source?: string, source?: string, groups?: string, suscriptionForm?: string | - | `Page<Member-member.read>` | `list_audience_members` |
| `create` | `$em->audiences('audienceUuid')->members->create($body, disableDoubleOptIn: true, disableWelcomeEmail: true, disableSmsDoubleOptIn: true)` | `POST` | `/audiences/{audienceUuid}/members` | disableDoubleOptIn?: bool, disableWelcomeEmail?: bool, disableSmsDoubleOptIn?: bool | `Member-member.write` | `Member-member.read` | `create_audience_member` |
| `get` | `$em->audiences('audienceUuid')->members->get('uuid')` | `GET` | `/audiences/{audienceUuid}/members/{uuid}` | - | - | `Member-member.read` | `get_audience_member` |
| `update` | `$em->audiences('audienceUuid')->members->update('uuid', $body)` | `PUT` | `/audiences/{audienceUuid}/members/{uuid}` | - | `Member-member.write` | `Member-member.read` | `update_audience_member` |
| `delete` | `$em->audiences('audienceUuid')->members->delete('uuid')` | `DELETE` | `/audiences/{audienceUuid}/members/{uuid}` | - | - | `void` | `delete_audience_member` |
| `addToGroup` | `$em->audiences('audienceUuid')->members->addToGroup('uuid', 'groupUuid')` | `PUT` | `/audiences/{audienceUuid}/members/{uuid}/actions/add_to_group/{groupUuid}` | - | - | `Member-member.read` | `member_add_from_group` |
| `removeFromGroup` | `$em->audiences('audienceUuid')->members->removeFromGroup('uuid', 'groupUuid')` | `PUT` | `/audiences/{audienceUuid}/members/{uuid}/actions/remove_from_group/{groupUuid}` | - | - | `Member-member.read` | `member_remove_from_group` |
| `subscribe` | `$em->audiences('audienceUuid')->members->subscribe('uuid', $body)` | `PUT` | `/audiences/{audienceUuid}/members/{uuid}/actions/subscribe` | - | `Member-member.action` | `Member-member.read` | `member_subscribe` |
| `unsubscribe` | `$em->audiences('audienceUuid')->members->unsubscribe('uuid', $body)` | `PUT` | `/audiences/{audienceUuid}/members/{uuid}/actions/unsubscribe` | - | `Member-member.action` | `Member-member.read` | `member_unsubscribe` |

### <a id="audiences.members.activities"></a>`audiences.members.activities`

- Access: `$em->audiences('audienceUuid')->members('memberUuid')->activities`
- API path: `/audiences/{audienceUuid}/members/{memberUuid}/activities`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->audiences('audienceUuid')->members('memberUuid')->activities->list($query)` | `GET` | `/audiences/{audienceUuid}/members/{memberUuid}/activities` | type?: string, page?: int, itemsPerPage?: int | - | `Page<MemberActivity-member_activity.read>` | `list_member_activities` |

### <a id="audiences.mergeTags"></a>`audiences.mergeTags`

- Access: `$em->audiences('audienceUuid')->mergeTags`
- API path: `/audiences/{audienceUuid}/merge_tags`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->audiences('audienceUuid')->mergeTags->list($query)` | `GET` | `/audiences/{audienceUuid}/merge_tags` | - | - | `Page<MergeTag-merge_tag.read>` | `list_audience_merge_tags` |

### <a id="audiences.subscriptionForms"></a>`audiences.subscriptionForms`

- Access: `$em->audiences('audienceUuid')->subscriptionForms`
- API path: `/audiences/{audienceUuid}/suscription_forms`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->audiences('audienceUuid')->subscriptionForms->list($query)` | `GET` | `/audiences/{audienceUuid}/suscription_forms` | page?: int, itemsPerPage?: int, title?: string, type?: string, active?: string, audience?: string | - | `Page<SuscriptionForm-suscription_form.read>` | `list_audience_forms` |
| `get` | `$em->audiences('audienceUuid')->subscriptionForms->get('uuid')` | `GET` | `/audiences/{audienceUuid}/suscription_forms/{uuid}` | - | - | `SuscriptionForm-suscription_form.read` | `get_audience_form` |
| `delete` | `$em->audiences('audienceUuid')->subscriptionForms->delete('uuid')` | `DELETE` | `/audiences/{audienceUuid}/suscription_forms/{uuid}` | - | - | `void` | `delete_form` |
| `pause` | `$em->audiences('audienceUuid')->subscriptionForms->pause('uuid')` | `PUT` | `/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/pause` | - | - | `SuscriptionForm-suscription_form.read` | `pause_form` |
| `publish` | `$em->audiences('audienceUuid')->subscriptionForms->publish('uuid')` | `PUT` | `/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/publish` | - | - | `SuscriptionForm-suscription_form.read` | `publish_form` |
| `resume` | `$em->audiences('audienceUuid')->subscriptionForms->resume('uuid')` | `PUT` | `/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/resume` | - | - | `SuscriptionForm-suscription_form.read` | `resume_form` |
| `unpublish` | `$em->audiences('audienceUuid')->subscriptionForms->unpublish('uuid')` | `PUT` | `/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/unpublish` | - | - | `SuscriptionForm-suscription_form.read` | `unpublish_form` |
| `createEmbedded` | `$em->audiences('audienceUuid')->subscriptionForms->createEmbedded($body)` | `POST` | `/audiences/{audienceUuid}/suscription_forms/embedded` | - | `SuscriptionForm.CreateEmbeddedFormDto-suscription_form.write` | `SuscriptionForm-suscription_form.read` | `create_embedded_form` |
| `createPopup` | `$em->audiences('audienceUuid')->subscriptionForms->createPopup($body)` | `POST` | `/audiences/{audienceUuid}/suscription_forms/popup` | - | `SuscriptionForm.CreatePopupFormDto-suscription_form.write` | `SuscriptionForm-suscription_form.read` | `create_popup_form` |
| `getPublishingInfo` | `$em->audiences('audienceUuid')->subscriptionForms->getPublishingInfo('uuid')` | `GET` | `/audiences/{audienceUuid}/suscription_forms/{uuid}/publishing_info` | - | - | `SuscriptionForm.PublishingInfoDto-suscription_form.read` | `get_form_publishing_info` |
| `updateEmbedded` | `$em->audiences('audienceUuid')->subscriptionForms->updateEmbedded('uuid', $body)` | `PUT` | `/audiences/{audienceUuid}/suscription_forms/{uuid}/embedded` | - | `SuscriptionForm.UpdateEmbeddedFormDto-suscription_form.write` | `SuscriptionForm-suscription_form.read` | `update_embedded_form` |
| `updatePopup` | `$em->audiences('audienceUuid')->subscriptionForms->updatePopup('uuid', $body)` | `PUT` | `/audiences/{audienceUuid}/suscription_forms/{uuid}/popup` | - | `SuscriptionForm.UpdatePopupFormDto-suscription_form.write` | `SuscriptionForm-suscription_form.read` | `update_popup_form` |

### <a id="automations"></a>`automations`

- Access: `$em->automations`
- API path: `/automations`
- Child resources: `automationQueues`, `automationSteps`, `triggers`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->automations->list($query)` | `GET` | `/automations` | page?: int, itemsPerPage?: int, title?: string, audience?: string | - | `Page<Automation-automation.read>` | `list_automations` |
| `create` | `$em->automations->create($body)` | `POST` | `/automations` | - | `Automation-automation.write` | `Automation-automation.read` | `create_automation` |
| `get` | `$em->automations->get('uuid')` | `GET` | `/automations/{uuid}` | - | - | `Automation-automation.read_automation.read.detail` | `get_automation` |
| `update` | `$em->automations->update('uuid', $body)` | `PUT` | `/automations/{uuid}` | - | `Automation-automation.write` | `Automation-automation.read` | `update_automation` |
| `delete` | `$em->automations->delete('uuid')` | `DELETE` | `/automations/{uuid}` | - | - | `void` | `delete_automation` |
| `activate` | `$em->automations->activate('uuid')` | `PUT` | `/automations/{uuid}/actions/activate` | - | - | `Automation-automation.read` | `automation_activate` |
| `pause` | `$em->automations->pause('uuid')` | `PUT` | `/automations/{uuid}/actions/pause` | - | - | `Automation-automation.read` | `automation_pause` |

### <a id="automations.automationQueues"></a>`automations.automationQueues`

- Access: `$em->automations('automationUuid')->automationQueues`
- API path: `/automations/{automationUuid}/automation_queues`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->automations('automationUuid')->automationQueues->list($query)` | `GET` | `/automations/{automationUuid}/automation_queues` | page?: int, itemsPerPage?: int | - | `Page<AutomationQueue-automation_queue.read>` | `list_automation_queues` |
| `get` | `$em->automations('automationUuid')->automationQueues->get('uuid')` | `GET` | `/automations/{automationUuid}/automation_queues/{uuid}` | - | - | `AutomationQueue-automation_queue.read` | `get_automation_queue` |
| `createTriggerCustomApi` | `$em->automations('automationUuid')->automationQueues->createTriggerCustomApi($body)` | `POST` | `/automations/{automationUuid}/automation_queues/trigger_custom_api` | - | `AutomationQueue.AutomationQueueTriggerInput-automation_queue.write` | `AutomationQueue-automation_queue.read` | `trigger_custom_api` |

### <a id="automations.automationSteps"></a>`automations.automationSteps`

- Access: `$em->automations('automationUuid')->automationSteps`
- API path: `/automations/{automationUuid}/automation_steps`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->automations('automationUuid')->automationSteps->list($query)` | `GET` | `/automations/{automationUuid}/automation_steps` | page?: int, itemsPerPage?: int | - | `Page<AutomationStep-automation_step.read>` | `list_automation_steps` |
| `get` | `$em->automations('automationUuid')->automationSteps->get('uuid')` | `GET` | `/automations/{automationUuid}/automation_steps/{uuid}` | - | - | `AutomationStep-automation_step.read` | `get_automation_step` |
| `delete` | `$em->automations('automationUuid')->automationSteps->delete('uuid', mode: 'mode')` | `DELETE` | `/automations/{automationUuid}/automation_steps/{uuid}` | mode?: string | - | `void` | `delete_automation_step` |
| `createAddToGroup` | `$em->automations('automationUuid')->automationSteps->createAddToGroup($body)` | `POST` | `/automations/{automationUuid}/automation_steps/add_to_group` | - | `AutomationStep.AutomationStepAddToGroup-automation_step.write` | `AutomationStep.AutomationStepAddToGroupResource-automation_step.read` | `create_step_add_to_group` |
| `createCondition` | `$em->automations('automationUuid')->automationSteps->createCondition($body)` | `POST` | `/automations/{automationUuid}/automation_steps/condition` | - | `AutomationStep.AutomationStepCondition-automation_step.write` | `AutomationStep.AutomationStepConditionResource-automation_step.read` | `create_step_condition` |
| `createDelay` | `$em->automations('automationUuid')->automationSteps->createDelay($body)` | `POST` | `/automations/{automationUuid}/automation_steps/delay` | - | `AutomationStep.AutomationStepDelay-automation_step.write` | `AutomationStep.AutomationStepDelayResource-automation_step.read` | `create_step_delay` |
| `createMoveToStep` | `$em->automations('automationUuid')->automationSteps->createMoveToStep($body)` | `POST` | `/automations/{automationUuid}/automation_steps/move_to_step` | - | `AutomationStep.AutomationStepMoveToStep-automation_step.write` | `AutomationStep.AutomationStepMoveToStepResource-automation_step.read` | `create_step_move_to_step` |
| `createRemoveFromGroup` | `$em->automations('automationUuid')->automationSteps->createRemoveFromGroup($body)` | `POST` | `/automations/{automationUuid}/automation_steps/remove_from_group` | - | `AutomationStep.AutomationStepRemoveFromGroup-automation_step.write` | `AutomationStep.AutomationStepRemoveFromGroupResource-automation_step.read` | `create_step_remove_from_group` |
| `createSendCampaign` | `$em->automations('automationUuid')->automationSteps->createSendCampaign($body)` | `POST` | `/automations/{automationUuid}/automation_steps/send_campaign` | - | `AutomationStep.AutomationStepSendCampaign-automation_step.write` | `AutomationStep.AutomationStepSendCampaignResource-automation_step.read` | `create_step_send_campaign` |
| `createSendNotification` | `$em->automations('automationUuid')->automationSteps->createSendNotification($body)` | `POST` | `/automations/{automationUuid}/automation_steps/send_notification` | - | `AutomationStep.AutomationStepSendNotification-automation_step.write` | `AutomationStep.AutomationStepSendNotificationResource-automation_step.read` | `create_step_send_notification` |
| `createSendSms` | `$em->automations('automationUuid')->automationSteps->createSendSms()` | `POST` | `/automations/{automationUuid}/automation_steps/send_sms` | - | - | `AutomationStep.AutomationStepSendSmsResource-automation_step.read` | `create_step_send_sms` |
| `createSendWebhook` | `$em->automations('automationUuid')->automationSteps->createSendWebhook($body)` | `POST` | `/automations/{automationUuid}/automation_steps/send_webhook` | - | `AutomationStep.AutomationStepSendWebhook-automation_step.write` | `AutomationStep.AutomationStepSendWebhookResource-automation_step.read` | `create_step_send_webhook` |
| `createTriggerAutomation` | `$em->automations('automationUuid')->automationSteps->createTriggerAutomation($body)` | `POST` | `/automations/{automationUuid}/automation_steps/trigger_automation` | - | `AutomationStep.AutomationStepTriggerAutomation-automation_step.write` | `AutomationStep.AutomationStepTriggerAutomationResource-automation_step.read` | `create_step_trigger_automation` |
| `createUnsubscribe` | `$em->automations('automationUuid')->automationSteps->createUnsubscribe($body)` | `POST` | `/automations/{automationUuid}/automation_steps/unsubscribe` | - | `AutomationStep.AutomationStepUnsubscribe-automation_step.write` | `AutomationStep.AutomationStepUnsubscribeResource-automation_step.read` | `create_step_unsubscribe` |
| `createUpdateCustomField` | `$em->automations('automationUuid')->automationSteps->createUpdateCustomField($body)` | `POST` | `/automations/{automationUuid}/automation_steps/update_custom_field` | - | `AutomationStep.AutomationStepUpdateCustomField-automation_step.write` | `AutomationStep.AutomationStepUpdateCustomFieldResource-automation_step.read` | `create_step_update_custom_field` |
| `createUpdateScore` | `$em->automations('automationUuid')->automationSteps->createUpdateScore($body)` | `POST` | `/automations/{automationUuid}/automation_steps/update_score` | - | `AutomationStep.AutomationStepUpdateScore-automation_step.write` | `AutomationStep.AutomationStepUpdateScoreResource-automation_step.read` | `create_step_update_score` |
| `updateAddToGroup` | `$em->automations('automationUuid')->automationSteps->updateAddToGroup('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/add_to_group` | - | `AutomationStep.AutomationStepAddToGroup-automation_step.write` | `AutomationStep.AutomationStepAddToGroupResource-automation_step.read` | `update_step_add_to_group` |
| `updateCondition` | `$em->automations('automationUuid')->automationSteps->updateCondition('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/condition` | - | `AutomationStep.AutomationStepCondition-automation_step.write` | `AutomationStep.AutomationStepConditionResource-automation_step.read` | `update_step_condition` |
| `updateDelay` | `$em->automations('automationUuid')->automationSteps->updateDelay('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/delay` | - | `AutomationStep.AutomationStepDelay-automation_step.write` | `AutomationStep.AutomationStepDelayResource-automation_step.read` | `update_step_delay` |
| `updateMoveToStep` | `$em->automations('automationUuid')->automationSteps->updateMoveToStep('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/move_to_step` | - | `AutomationStep.AutomationStepMoveToStep-automation_step.write` | `AutomationStep.AutomationStepMoveToStepResource-automation_step.read` | `update_step_move_to_step` |
| `updatePosition` | `$em->automations('automationUuid')->automationSteps->updatePosition('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/position` | - | `AutomationStep.AutomationStepPosition-automation_step.write` | `AutomationStep-automation_step.read` | `move_step_position` |
| `updateRemoveFromGroup` | `$em->automations('automationUuid')->automationSteps->updateRemoveFromGroup('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/remove_from_group` | - | `AutomationStep.AutomationStepRemoveFromGroup-automation_step.write` | `AutomationStep.AutomationStepRemoveFromGroupResource-automation_step.read` | `update_step_remove_from_group` |
| `updateSendCampaign` | `$em->automations('automationUuid')->automationSteps->updateSendCampaign('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/send_campaign` | - | `AutomationStep.AutomationStepSendCampaign-automation_step.write` | `AutomationStep.AutomationStepSendCampaignResource-automation_step.read` | `update_step_send_campaign` |
| `updateSendNotification` | `$em->automations('automationUuid')->automationSteps->updateSendNotification('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/send_notification` | - | `AutomationStep.AutomationStepSendNotification-automation_step.write` | `AutomationStep.AutomationStepSendNotificationResource-automation_step.read` | `update_step_send_notification` |
| `updateSendSms` | `$em->automations('automationUuid')->automationSteps->updateSendSms('uuid')` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/send_sms` | - | - | `AutomationStep.AutomationStepSendSmsResource-automation_step.read` | `update_step_send_sms` |
| `updateSendWebhook` | `$em->automations('automationUuid')->automationSteps->updateSendWebhook('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/send_webhook` | - | `AutomationStep.AutomationStepSendWebhook-automation_step.write` | `AutomationStep.AutomationStepSendWebhookResource-automation_step.read` | `update_step_send_webhook` |
| `updateTriggerAutomation` | `$em->automations('automationUuid')->automationSteps->updateTriggerAutomation('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/trigger_automation` | - | `AutomationStep.AutomationStepTriggerAutomation-automation_step.write` | `AutomationStep.AutomationStepTriggerAutomationResource-automation_step.read` | `update_step_trigger_automation` |
| `updateUnsubscribe` | `$em->automations('automationUuid')->automationSteps->updateUnsubscribe('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/unsubscribe` | - | `AutomationStep.AutomationStepUnsubscribe-automation_step.write` | `AutomationStep.AutomationStepUnsubscribeResource-automation_step.read` | `update_step_unsubscribe` |
| `updateUpdateCustomField` | `$em->automations('automationUuid')->automationSteps->updateUpdateCustomField('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/update_custom_field` | - | `AutomationStep.AutomationStepUpdateCustomField-automation_step.write` | `AutomationStep.AutomationStepUpdateCustomFieldResource-automation_step.read` | `update_step_update_custom_field` |
| `updateUpdateScore` | `$em->automations('automationUuid')->automationSteps->updateUpdateScore('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_steps/{uuid}/update_score` | - | `AutomationStep.AutomationStepUpdateScore-automation_step.write` | `AutomationStep.AutomationStepUpdateScoreResource-automation_step.read` | `update_step_update_score` |

### <a id="automations.triggers"></a>`automations.triggers`

- Access: `$em->automations('automationUuid')->triggers`
- API path: `/automations/{automationUuid}/automation_triggers`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->automations('automationUuid')->triggers->list($query)` | `GET` | `/automations/{automationUuid}/automation_triggers` | page?: int, itemsPerPage?: int | - | `Page<AutomationTrigger-automation_trigger.read>` | `list_automation_triggers` |
| `get` | `$em->automations('automationUuid')->triggers->get('uuid')` | `GET` | `/automations/{automationUuid}/automation_triggers/{uuid}` | - | - | `AutomationTrigger-automation_trigger.read` | `get_automation_trigger` |
| `delete` | `$em->automations('automationUuid')->triggers->delete('uuid')` | `DELETE` | `/automations/{automationUuid}/automation_triggers/{uuid}` | - | - | `void` | `delete_automation_trigger` |
| `createAbandonedCart` | `$em->automations('automationUuid')->triggers->createAbandonedCart($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/abandoned_cart` | - | `AutomationTrigger.AutomationTriggerAbandonedCart-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_abandoned_cart` |
| `createAdminManual` | `$em->automations('automationUuid')->triggers->createAdminManual($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/admin_manual` | - | `AutomationTrigger.AutomationTriggerAdminManual-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_admin_manual` |
| `createAniversaryDate` | `$em->automations('automationUuid')->triggers->createAniversaryDate($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/aniversary_date` | - | `AutomationTrigger.AutomationTriggerAniversaryDate-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_anniversary_date` |
| `createBuyAProduct` | `$em->automations('automationUuid')->triggers->createBuyAProduct($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/buy_a_product` | - | `AutomationTrigger.AutomationTriggerBuyAProduct-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_buy_a_product` |
| `createClickOnCampaign` | `$em->automations('automationUuid')->triggers->createClickOnCampaign($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/click_on_campaign` | - | `AutomationTrigger.AutomationTriggerClickOnCampaign-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_click_on_campaign` |
| `createClickOnCampaignLink` | `$em->automations('automationUuid')->triggers->createClickOnCampaignLink($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/click_on_campaign_link` | - | `AutomationTrigger.AutomationTriggerClickOnCampaignLink-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_click_on_campaign_link` |
| `createContactAddedToGroup` | `$em->automations('automationUuid')->triggers->createContactAddedToGroup($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/contact_added_to_group` | - | `AutomationTrigger.AutomationTriggerContactAddedToGroup-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_contact_added_to_group` |
| `createContactRemovedFromGroup` | `$em->automations('automationUuid')->triggers->createContactRemovedFromGroup($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/contact_removed_from_group` | - | `AutomationTrigger.AutomationTriggerContactRemovedFromGroup-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_contact_removed_from_group` |
| `createContactSubscribed` | `$em->automations('automationUuid')->triggers->createContactSubscribed($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/contact_subscribed` | - | `AutomationTrigger.AutomationTriggerContactSubscribed-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_contact_subscribed` |
| `createCustomApi` | `$em->automations('automationUuid')->triggers->createCustomApi($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/custom_api` | - | `AutomationTrigger.AutomationTriggerCustomApi-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_custom_api` |
| `createFormCompleted` | `$em->automations('automationUuid')->triggers->createFormCompleted($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/form_completed` | - | `AutomationTrigger.AutomationTriggerFormCompleted-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_form_completed` |
| `createNotClickOnCampaign` | `$em->automations('automationUuid')->triggers->createNotClickOnCampaign($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/not_click_on_campaign` | - | `AutomationTrigger.AutomationTriggerNotClickOnCampaign-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_not_click_on_campaign` |
| `createNotOpenOnCampaign` | `$em->automations('automationUuid')->triggers->createNotOpenOnCampaign($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/not_open_on_campaign` | - | `AutomationTrigger.AutomationTriggerNotOpenOnCampaign-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_not_open_on_campaign` |
| `createOpenOnCampaign` | `$em->automations('automationUuid')->triggers->createOpenOnCampaign($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/open_on_campaign` | - | `AutomationTrigger.AutomationTriggerOpenOnCampaign-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_open_on_campaign` |
| `createOrderCancelled` | `$em->automations('automationUuid')->triggers->createOrderCancelled($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/order_cancelled` | - | `AutomationTrigger.AutomationTriggerOrderCancelled-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_order_cancelled` |
| `createOrderPaid` | `$em->automations('automationUuid')->triggers->createOrderPaid($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/order_paid` | - | `AutomationTrigger.AutomationTriggerOrderPaid-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_order_paid` |
| `createOrderProcessed` | `$em->automations('automationUuid')->triggers->createOrderProcessed($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/order_processed` | - | `AutomationTrigger.AutomationTriggerOrderProcessed-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_order_processed` |
| `createOrderRefunded` | `$em->automations('automationUuid')->triggers->createOrderRefunded($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/order_refunded` | - | `AutomationTrigger.AutomationTriggerOrderRefunded-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_order_refunded` |
| `createOrderShipped` | `$em->automations('automationUuid')->triggers->createOrderShipped($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/order_shipped` | - | `AutomationTrigger.AutomationTriggerOrderShipped-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_order_shipped` |
| `createPaymentReminder` | `$em->automations('automationUuid')->triggers->createPaymentReminder($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/payment_reminder` | - | `AutomationTrigger.AutomationTriggerPaymentReminder-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_payment_reminder` |
| `createSendACampaign` | `$em->automations('automationUuid')->triggers->createSendACampaign($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/send_a_campaign` | - | `AutomationTrigger.AutomationTriggerSendACampaign-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_send_a_campaign` |
| `createSpecificDate` | `$em->automations('automationUuid')->triggers->createSpecificDate($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/specific_date` | - | `AutomationTrigger.AutomationTriggerSpecificDate-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_specific_date` |
| `createSuscriberRevalidation` | `$em->automations('automationUuid')->triggers->createSuscriberRevalidation($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/suscriber_revalidation` | - | `AutomationTrigger.AutomationTriggerSuscriberRevalidation-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_suscriber_revalidation` |
| `createSuscriptionDate` | `$em->automations('automationUuid')->triggers->createSuscriptionDate($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/suscription_date` | - | `AutomationTrigger.AutomationTriggerSuscriptionDate-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_suscription_date` |
| `createTimeSinceLastPurchase` | `$em->automations('automationUuid')->triggers->createTimeSinceLastPurchase($body)` | `POST` | `/automations/{automationUuid}/automation_triggers/time_since_last_purchase` | - | `AutomationTrigger.AutomationTriggerTimeSinceLastPurchase-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `create_trigger_time_since_last_purchase` |
| `updateAbandonedCart` | `$em->automations('automationUuid')->triggers->updateAbandonedCart('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/abandoned_cart` | - | `AutomationTrigger.AutomationTriggerAbandonedCart-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_abandoned_cart` |
| `updateAdminManual` | `$em->automations('automationUuid')->triggers->updateAdminManual('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/admin_manual` | - | `AutomationTrigger.AutomationTriggerAdminManual-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_admin_manual` |
| `updateAniversaryDate` | `$em->automations('automationUuid')->triggers->updateAniversaryDate('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/aniversary_date` | - | `AutomationTrigger.AutomationTriggerAniversaryDate-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_anniversary_date` |
| `updateBuyAProduct` | `$em->automations('automationUuid')->triggers->updateBuyAProduct('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/buy_a_product` | - | `AutomationTrigger.AutomationTriggerBuyAProduct-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_buy_a_product` |
| `updateClickOnCampaign` | `$em->automations('automationUuid')->triggers->updateClickOnCampaign('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/click_on_campaign` | - | `AutomationTrigger.AutomationTriggerClickOnCampaign-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_click_on_campaign` |
| `updateClickOnCampaignLink` | `$em->automations('automationUuid')->triggers->updateClickOnCampaignLink('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/click_on_campaign_link` | - | `AutomationTrigger.AutomationTriggerClickOnCampaignLink-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_click_on_campaign_link` |
| `updateContactAddedToGroup` | `$em->automations('automationUuid')->triggers->updateContactAddedToGroup('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/contact_added_to_group` | - | `AutomationTrigger.AutomationTriggerContactAddedToGroup-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_contact_added_to_group` |
| `updateContactRemovedFromGroup` | `$em->automations('automationUuid')->triggers->updateContactRemovedFromGroup('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/contact_removed_from_group` | - | `AutomationTrigger.AutomationTriggerContactRemovedFromGroup-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_contact_removed_from_group` |
| `updateContactSubscribed` | `$em->automations('automationUuid')->triggers->updateContactSubscribed('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/contact_subscribed` | - | `AutomationTrigger.AutomationTriggerContactSubscribed-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_contact_subscribed` |
| `updateCustomApi` | `$em->automations('automationUuid')->triggers->updateCustomApi('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/custom_api` | - | `AutomationTrigger.AutomationTriggerCustomApi-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_custom_api` |
| `updateEnable` | `$em->automations('automationUuid')->triggers->updateEnable('uuid')` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/enable` | - | - | `AutomationTrigger-automation_trigger.read` | `automation_trigger_enable` |
| `updateFormCompleted` | `$em->automations('automationUuid')->triggers->updateFormCompleted('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/form_completed` | - | `AutomationTrigger.AutomationTriggerFormCompleted-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_form_completed` |
| `updateNotClickOnCampaign` | `$em->automations('automationUuid')->triggers->updateNotClickOnCampaign('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/not_click_on_campaign` | - | `AutomationTrigger.AutomationTriggerNotClickOnCampaign-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_not_click_on_campaign` |
| `updateNotOpenOnCampaign` | `$em->automations('automationUuid')->triggers->updateNotOpenOnCampaign('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/not_open_on_campaign` | - | `AutomationTrigger.AutomationTriggerNotOpenOnCampaign-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_not_open_on_campaign` |
| `updateOpenOnCampaign` | `$em->automations('automationUuid')->triggers->updateOpenOnCampaign('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/open_on_campaign` | - | `AutomationTrigger.AutomationTriggerOpenOnCampaign-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_open_on_campaign` |
| `updateOrderCancelled` | `$em->automations('automationUuid')->triggers->updateOrderCancelled('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/order_cancelled` | - | `AutomationTrigger.AutomationTriggerOrderCancelled-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_order_cancelled` |
| `updateOrderPaid` | `$em->automations('automationUuid')->triggers->updateOrderPaid('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/order_paid` | - | `AutomationTrigger.AutomationTriggerOrderPaid-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_order_paid` |
| `updateOrderProcessed` | `$em->automations('automationUuid')->triggers->updateOrderProcessed('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/order_processed` | - | `AutomationTrigger.AutomationTriggerOrderProcessed-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_order_processed` |
| `updateOrderRefunded` | `$em->automations('automationUuid')->triggers->updateOrderRefunded('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/order_refunded` | - | `AutomationTrigger.AutomationTriggerOrderRefunded-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_order_refunded` |
| `updateOrderShipped` | `$em->automations('automationUuid')->triggers->updateOrderShipped('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/order_shipped` | - | `AutomationTrigger.AutomationTriggerOrderShipped-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_order_shipped` |
| `updatePause` | `$em->automations('automationUuid')->triggers->updatePause('uuid')` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/pause` | - | - | `AutomationTrigger-automation_trigger.read` | `automation_trigger_pause` |
| `updatePaymentReminder` | `$em->automations('automationUuid')->triggers->updatePaymentReminder('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/payment_reminder` | - | `AutomationTrigger.AutomationTriggerPaymentReminder-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_payment_reminder` |
| `updateSendACampaign` | `$em->automations('automationUuid')->triggers->updateSendACampaign('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/send_a_campaign` | - | `AutomationTrigger.AutomationTriggerSendACampaign-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_send_a_campaign` |
| `updateSpecificDate` | `$em->automations('automationUuid')->triggers->updateSpecificDate('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/specific_date` | - | `AutomationTrigger.AutomationTriggerSpecificDate-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_specific_date` |
| `updateSuscriberRevalidation` | `$em->automations('automationUuid')->triggers->updateSuscriberRevalidation('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/suscriber_revalidation` | - | `AutomationTrigger.AutomationTriggerSuscriberRevalidation-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_suscriber_revalidation` |
| `updateSuscriptionDate` | `$em->automations('automationUuid')->triggers->updateSuscriptionDate('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/suscription_date` | - | `AutomationTrigger.AutomationTriggerSuscriptionDate-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_suscription_date` |
| `updateTimeSinceLastPurchase` | `$em->automations('automationUuid')->triggers->updateTimeSinceLastPurchase('uuid', $body)` | `PUT` | `/automations/{automationUuid}/automation_triggers/{uuid}/time_since_last_purchase` | - | `AutomationTrigger.AutomationTriggerTimeSinceLastPurchase-automation_trigger.write` | `AutomationTrigger-automation_trigger.read` | `update_trigger_time_since_last_purchase` |

### <a id="batchOperations"></a>`batchOperations`

- Access: `$em->batchOperations`
- API path: `/batch_operations`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->batchOperations->list($query)` | `GET` | `/batch_operations` | page?: int, itemsPerPage?: int | - | `Page<BatchOperation-batch_operation.read>` | `list_batch_operations` |
| `create` | `$em->batchOperations->create($body)` | `POST` | `/batch_operations` | - | `BatchOperation-batch_operation.write` | `BatchOperation-batch_operation.read` | `create_batch_operation` |
| `get` | `$em->batchOperations->get('uuid')` | `GET` | `/batch_operations/{uuid}` | - | - | `BatchOperation-batch_operation.read` | `get_batch_operation` |
| `delete` | `$em->batchOperations->delete('uuid')` | `DELETE` | `/batch_operations/{uuid}` | - | - | `void` | `delete_batch_operation` |
| `regenerateResponseBodyUrl` | `$em->batchOperations->regenerateResponseBodyUrl('uuid')` | `PUT` | `/batch_operations/{uuid}/actions/regenerate_response_body_url` | - | - | `BatchOperationResource` | `regenerate_response_body_url` |
| `getErrors` | `$em->batchOperations->getErrors('uuid')` | `GET` | `/batch_operations/{uuid}/errors` | - | - | `BatchOperationResource.BatchOperationErrorsResource-batch_operation_errors.read` | `get_batch_operation_errors` |

### <a id="campaigns"></a>`campaigns`

- Access: `$em->campaigns`
- API path: `/campaigns`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->campaigns->list($query)` | `GET` | `/campaigns` | page?: int, itemsPerPage?: int, title?: string, status?: string, type?: string, hash?: string, audience?: string | - | `Page<Campaign-campaign.read>` | `list_campaigns` |
| `create` | `$em->campaigns->create($body)` | `POST` | `/campaigns` | - | `Campaign-campaign.write` | `Campaign-campaign.read` | `create_campaign` |
| `get` | `$em->campaigns->get('uuid')` | `GET` | `/campaigns/{uuid}` | - | - | `Campaign-campaign.read_campaign.read.detail` | `get_campaign` |
| `update` | `$em->campaigns->update('uuid', $body)` | `PUT` | `/campaigns/{uuid}` | - | `Campaign-campaign.write` | `Campaign-campaign.read` | `update_campaign` |
| `delete` | `$em->campaigns->delete('uuid')` | `DELETE` | `/campaigns/{uuid}` | - | - | `void` | `delete_campaign` |
| `duplicate` | `$em->campaigns->duplicate('uuid', $body)` | `POST` | `/campaigns/{uuid}/actions/duplicate` | - | `Campaign.CampaignDuplicateInput-campaign.write_duplicate` | `Campaign-campaign.read` | `duplicate_campaign` |
| `schedule` | `$em->campaigns->schedule('uuid', $body)` | `PUT` | `/campaigns/{uuid}/actions/schedule` | - | `Campaign.CampaignSendInput-campaign.write_schedule` | `array` | `campaign_schedule` |
| `sendNow` | `$em->campaigns->sendNow('uuid', $body)` | `PUT` | `/campaigns/{uuid}/actions/send_now` | - | `Campaign.CampaignSendInput-campaign.write_send` | `array` | `campaign_send_now` |
| `sendTest` | `$em->campaigns->sendTest('uuid', $body)` | `PUT` | `/campaigns/{uuid}/actions/send_test` | - | `Campaign.CampaignSendTestInput-campaign.write_send_test` | `array` | `campaign_send_test` |
| `createRevalidation` | `$em->campaigns->createRevalidation($body)` | `POST` | `/campaigns/revalidation` | - | `Campaign.CampaignRevalidationInput-campaign.write` | `Campaign-campaign.read` | `create_campaign_revalidation` |
| `createTestAbSender` | `$em->campaigns->createTestAbSender($body)` | `POST` | `/campaigns/test_ab/sender` | - | `Campaign.CampaignTestABSenderInput-campaign.write.test_ab_sender` | `Campaign-campaign.read` | `create_campaign_test_ab_sender` |
| `createTestAbSubject` | `$em->campaigns->createTestAbSubject($body)` | `POST` | `/campaigns/test_ab/subject` | - | `Campaign.CampaignTestABSubjectInput-campaign.write.test_ab_subject` | `Campaign-campaign.read` | `create_campaign_test_ab_subject` |
| `createTestAbTemplate` | `$em->campaigns->createTestAbTemplate($body)` | `POST` | `/campaigns/test_ab/template` | - | `Campaign.CampaignTestABTemplateInput-campaign.write.test_ab_template` | `Campaign-campaign.read` | `create_campaign_test_ab_template` |

### <a id="dataManagers"></a>`dataManagers`

- Access: `$em->dataManagers`
- API path: `/data_managers`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->dataManagers->list($query)` | `GET` | `/data_managers` | page?: int, itemsPerPage?: int | - | `Page<DataManager-data_manager.read>` | `list_data_managers` |
| `create` | `$em->dataManagers->create($body)` | `POST` | `/data_managers` | - | `DataManager-data_manager.write` | `DataManager-data_manager.read` | `create_data_manager` |
| `get` | `$em->dataManagers->get('uuid')` | `GET` | `/data_managers/{uuid}` | - | - | `DataManager-data_manager.read` | `get_data_manager` |
| `update` | `$em->dataManagers->update('uuid', $body)` | `PUT` | `/data_managers/{uuid}` | - | `DataManager-data_manager.write` | `DataManager-data_manager.read` | `update_data_manager` |
| `delete` | `$em->dataManagers->delete('uuid')` | `DELETE` | `/data_managers/{uuid}` | - | - | `void` | `delete_data_manager` |

### <a id="designSettings"></a>`designSettings`

- Access: `$em->designSettings`
- API path: `/design_settings`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->designSettings->list($query)` | `GET` | `/design_settings` | page?: int, itemsPerPage?: int | - | `Page<DesignSetting-design_setting.read>` | `list_design_settings` |
| `create` | `$em->designSettings->create($body)` | `POST` | `/design_settings` | - | `DesignSetting-design_setting.create` | `DesignSetting-design_setting.read` | `create_design_setting` |
| `get` | `$em->designSettings->get('uuid')` | `GET` | `/design_settings/{uuid}` | - | - | `DesignSetting-design_setting.read` | `get_design_setting` |
| `update` | `$em->designSettings->update('uuid', $body)` | `PUT` | `/design_settings/{uuid}` | - | `DesignSetting-design_setting.write` | `DesignSetting-design_setting.read` | `update_design_setting` |
| `delete` | `$em->designSettings->delete('uuid')` | `DELETE` | `/design_settings/{uuid}` | - | - | `void` | `delete_design_setting` |
| `createFromUrl` | `$em->designSettings->createFromUrl($body)` | `POST` | `/design_settings/from_url` | - | `DesignSetting.CreateFromUrlInput-design_setting.from_url` | `DesignSetting-design_setting.read` | `create_design_setting_from_url` |

### <a id="invoices"></a>`invoices`

- Access: `$em->invoices`
- API path: `/invoices`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->invoices->list($query)` | `GET` | `/invoices` | page?: int, itemsPerPage?: int | - | `Page<Invoice-invoice.read>` | `list_invoices` |
| `get` | `$em->invoices->get('uuid')` | `GET` | `/invoices/{uuid}` | - | - | `Invoice-invoice.read` | `get_invoice` |

### <a id="listSegmentConditions"></a>`listSegmentConditions`

- Access: `$em->listSegmentConditions`
- API path: `/list_segment_conditions`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `get` | `$em->listSegmentConditions->get()` | `GET` | `/list_segment_conditions` | - | - | `ListSegmentCondition` | `api_list_segment_conditions_get` |

### <a id="masterTemplates"></a>`masterTemplates`

- Access: `$em->masterTemplates`
- API path: `/master_templates`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->masterTemplates->list($query)` | `GET` | `/master_templates` | page?: int, itemsPerPage?: int, title?: string, order[created_at]?: string, order[updated_at]?: string, order[title]?: string | - | `Page<MasterTemplate-master_template.read>` | `list_master_templates` |
| `get` | `$em->masterTemplates->get('uuid')` | `GET` | `/master_templates/{uuid}` | - | - | `MasterTemplate-master_template.read` | `get_master_template` |
| `createTemplate` | `$em->masterTemplates->createTemplate('uuid', $body)` | `POST` | `/master_templates/{uuid}/actions/create_template` | - | `MasterTemplate.CreateTemplateFromMasterInput-master_template.write` | `MasterTemplate.TemplateResource-template.read` | `create_template_from_master` |

### <a id="memberCampaignDeliveredEvents"></a>`memberCampaignDeliveredEvents`

- Access: `$em->memberCampaignDeliveredEvents`
- API path: `/member_campaign_delivered_events`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `get` | `$em->memberCampaignDeliveredEvents->get()` | `GET` | `/member_campaign_delivered_events` | - | - | `MemberCampaignDeliveredEvent` | `api_member_campaign_delivered_events_get` |

### <a id="members"></a>`members`

- Access: `$em->members`
- API path: `/members`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `search` | `$em->members->search(email: 'email', status: 'status', phone: 'phone', smsStatus: 'smsStatus', emailOptInSource: 'emailOptInSource', smsOptInSource: 'smsOptInSource', source: 'source', groups: 'groups', suscriptionForm: 'suscriptionForm')` | `GET` | `/members/search` | email?: string, status?: string, phone?: string, sms_status?: string, email_opt_in_source?: string, sms_opt_in_source?: string, source?: string, groups?: string, suscriptionForm?: string | - | `Page<Member-member.read>` | `search_member_by_email` |

### <a id="memberSmsBouncedEvents"></a>`memberSmsBouncedEvents`

- Access: `$em->memberSmsBouncedEvents`
- API path: `/member_sms_bounced_events`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `get` | `$em->memberSmsBouncedEvents->get()` | `GET` | `/member_sms_bounced_events` | - | - | `MemberSmsBouncedEvent` | `api_member_sms_bounced_events_get` |

### <a id="memberSmsClickedEvents"></a>`memberSmsClickedEvents`

- Access: `$em->memberSmsClickedEvents`
- API path: `/member_sms_clicked_events`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `get` | `$em->memberSmsClickedEvents->get()` | `GET` | `/member_sms_clicked_events` | - | - | `MemberSmsClickedEvent` | `api_member_sms_clicked_events_get` |

### <a id="memberSmsDeliveredEvents"></a>`memberSmsDeliveredEvents`

- Access: `$em->memberSmsDeliveredEvents`
- API path: `/member_sms_delivered_events`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `get` | `$em->memberSmsDeliveredEvents->get()` | `GET` | `/member_sms_delivered_events` | - | - | `MemberSmsDeliveredEvent` | `api_member_sms_delivered_events_get` |

### <a id="memberSmsRepliedEvents"></a>`memberSmsRepliedEvents`

- Access: `$em->memberSmsRepliedEvents`
- API path: `/member_sms_replied_events`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `get` | `$em->memberSmsRepliedEvents->get()` | `GET` | `/member_sms_replied_events` | - | - | `MemberSmsRepliedEvent` | `api_member_sms_replied_events_get` |

### <a id="memberSmsSubscribedEvents"></a>`memberSmsSubscribedEvents`

- Access: `$em->memberSmsSubscribedEvents`
- API path: `/member_sms_subscribed_events`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `get` | `$em->memberSmsSubscribedEvents->get()` | `GET` | `/member_sms_subscribed_events` | - | - | `MemberSmsSubscribedEvent` | `api_member_sms_subscribed_events_get` |

### <a id="memberSmsUnsubscribedEvents"></a>`memberSmsUnsubscribedEvents`

- Access: `$em->memberSmsUnsubscribedEvents`
- API path: `/member_sms_unsubscribed_events`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `get` | `$em->memberSmsUnsubscribedEvents->get()` | `GET` | `/member_sms_unsubscribed_events` | - | - | `MemberSmsUnsubscribedEvent` | `api_member_sms_unsubscribed_events_get` |

### <a id="mySubscription"></a>`mySubscription`

- Access: `$em->mySubscription`
- API path: `/my_suscription`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `get` | `$em->mySubscription->get()` | `GET` | `/my_suscription` | - | - | `MySuscription-my_suscription.read` | `api_my_suscription_get` |

### <a id="senderDomains"></a>`senderDomains`

- Access: `$em->senderDomains`
- API path: `/sender_domains`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->senderDomains->list($query)` | `GET` | `/sender_domains` | page?: int, itemsPerPage?: int | - | `Page<SenderDomain-sender_domain.read>` | `list_sender_domains` |
| `create` | `$em->senderDomains->create($body)` | `POST` | `/sender_domains` | - | `SenderDomain-sender_domain.write` | `SenderDomain-sender_domain.read` | `create_sender_domain` |
| `get` | `$em->senderDomains->get('uuid')` | `GET` | `/sender_domains/{uuid}` | - | - | `SenderDomain-sender_domain.read` | `get_sender_domain` |
| `delete` | `$em->senderDomains->delete('uuid')` | `DELETE` | `/sender_domains/{uuid}` | - | - | `void` | `delete_sender_domain` |
| `authenticate` | `$em->senderDomains->authenticate('uuid')` | `PUT` | `/sender_domains/{uuid}/actions/authenticate` | - | - | `SenderDomain.SenderDomainAuthenticateOutput-sender_domain.read` | `authenticate_sender_domain` |
| `resendVerification` | `$em->senderDomains->resendVerification('uuid')` | `POST` | `/sender_domains/{uuid}/actions/resend_verification` | - | - | `array` | `resend_sender_domain_verification` |

### <a id="senders"></a>`senders`

- Access: `$em->senders`
- API path: `/senders`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->senders->list($query)` | `GET` | `/senders` | page?: int, itemsPerPage?: int | - | `Page<Sender-sender.read>` | `list_senders` |
| `create` | `$em->senders->create($body)` | `POST` | `/senders` | - | `Sender-sender.write` | `Sender-sender.read` | `create_sender` |
| `get` | `$em->senders->get('uuid')` | `GET` | `/senders/{uuid}` | - | - | `Sender-sender.read` | `get_sender` |
| `delete` | `$em->senders->delete('uuid')` | `DELETE` | `/senders/{uuid}` | - | - | `void` | `delete_sender` |
| `resendVerification` | `$em->senders->resendVerification('uuid')` | `POST` | `/senders/{uuid}/actions/resend_verification` | - | - | `array` | `resend_sender_verification` |

### <a id="smsCampaigns"></a>`smsCampaigns`

- Access: `$em->smsCampaigns`
- API path: `/sms_campaigns`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->smsCampaigns->list($query)` | `GET` | `/sms_campaigns` | page?: int, itemsPerPage?: int, title?: string, status?: string, type?: string, hash?: string, audience?: string | - | `Page<SmsCampaign-campaign.read>` | `list_sms_campaigns` |
| `create` | `$em->smsCampaigns->create($body)` | `POST` | `/sms_campaigns` | - | `SmsCampaign.CampaignSmsInput-campaign.write.sms` | `SmsCampaign-campaign.read` | `create_sms_campaign` |
| `get` | `$em->smsCampaigns->get('uuid')` | `GET` | `/sms_campaigns/{uuid}` | - | - | `SmsCampaign-campaign.read_campaign.read.detail` | `get_sms_campaign` |
| `update` | `$em->smsCampaigns->update('uuid', $body)` | `PUT` | `/sms_campaigns/{uuid}` | - | `SmsCampaign.CampaignSmsInput-campaign.write.sms` | `SmsCampaign-campaign.read` | `update_sms_campaign` |
| `delete` | `$em->smsCampaigns->delete('uuid')` | `DELETE` | `/sms_campaigns/{uuid}` | - | - | `void` | `delete_sms_campaign` |
| `duplicate` | `$em->smsCampaigns->duplicate('uuid', $body)` | `POST` | `/sms_campaigns/{uuid}/actions/duplicate` | - | `SmsCampaign.CampaignDuplicateInput-campaign.write_duplicate` | `SmsCampaign-campaign.read` | `duplicate_sms_campaign` |
| `schedule` | `$em->smsCampaigns->schedule('uuid', $body)` | `PUT` | `/sms_campaigns/{uuid}/actions/schedule` | - | `SmsCampaign.CampaignSendInput-campaign.write_schedule` | `array` | `schedule_sms_campaign` |
| `sendNow` | `$em->smsCampaigns->sendNow('uuid', $body)` | `PUT` | `/sms_campaigns/{uuid}/actions/send_now` | - | `SmsCampaign.CampaignSendInput-campaign.write_send` | `array` | `send_sms_campaign_now` |
| `sendTest` | `$em->smsCampaigns->sendTest('uuid', $body)` | `PUT` | `/sms_campaigns/{uuid}/actions/send_test` | - | `SmsCampaign.CampaignSendSmsTestInput-campaign.write_send_sms_test` | `array` | `send_sms_campaign_test` |

### <a id="smsSenders"></a>`smsSenders`

- Access: `$em->smsSenders`
- API path: `/sms_senders`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->smsSenders->list($query)` | `GET` | `/sms_senders` | page?: int, itemsPerPage?: int | - | `Page<SmsSender-sms_sender.read>` | `list_sms_senders` |
| `create` | `$em->smsSenders->create($body)` | `POST` | `/sms_senders` | - | `SmsSender-sms_sender.write` | `SmsSender-sms_sender.read` | `create_sms_sender` |
| `get` | `$em->smsSenders->get('id')` | `GET` | `/sms_senders/{id}` | - | - | `SmsSender-sms_sender.read` | `get_sms_sender` |
| `delete` | `$em->smsSenders->delete('id')` | `DELETE` | `/sms_senders/{id}` | - | - | `void` | `delete_sms_sender` |

### <a id="stores"></a>`stores`

- Access: `$em->stores`
- API path: `/stores`
- Child resources: `categories`, `customers`, `orders`, `products`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->stores->list($query)` | `GET` | `/stores` | page?: int, itemsPerPage?: int, audience?: string | - | `Page<Store-store.read>` | `list_stores` |
| `create` | `$em->stores->create($body)` | `POST` | `/stores` | - | `Store-store.create` | `Store-store.read` | `create_store` |
| `get` | `$em->stores->get('resourceId')` | `GET` | `/stores/{resourceId}` | - | - | `Store-store.read` | `get_store` |
| `update` | `$em->stores->update('resourceId', $body)` | `PUT` | `/stores/{resourceId}` | - | `Store-store.update` | `Store-store.read` | `update_store` |
| `delete` | `$em->stores->delete('resourceId')` | `DELETE` | `/stores/{resourceId}` | - | - | `void` | `delete_store` |

### <a id="stores.categories"></a>`stores.categories`

- Access: `$em->stores('storeResourceId')->categories`
- API path: `/stores/{storeResourceId}/categories`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->stores('storeResourceId')->categories->list($query)` | `GET` | `/stores/{storeResourceId}/categories` | page?: int, itemsPerPage?: int | - | `Page<Category-category.read>` | `list_store_categories` |
| `create` | `$em->stores('storeResourceId')->categories->create($body)` | `POST` | `/stores/{storeResourceId}/categories` | - | `Category-category.create` | `Category-category.read` | `create_store_category` |
| `get` | `$em->stores('storeResourceId')->categories->get('resourceId')` | `GET` | `/stores/{storeResourceId}/categories/{resourceId}` | - | - | `Category-category.read` | `get_store_category` |
| `update` | `$em->stores('storeResourceId')->categories->update('resourceId', $body)` | `PUT` | `/stores/{storeResourceId}/categories/{resourceId}` | - | `Category-category.update` | `Category-category.read` | `update_store_category` |
| `delete` | `$em->stores('storeResourceId')->categories->delete('resourceId')` | `DELETE` | `/stores/{storeResourceId}/categories/{resourceId}` | - | - | `void` | `delete_store_category` |

### <a id="stores.customers"></a>`stores.customers`

- Access: `$em->stores('storeResourceId')->customers`
- API path: `/stores/{storeResourceId}/customers`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->stores('storeResourceId')->customers->list($query)` | `GET` | `/stores/{storeResourceId}/customers` | page?: int, itemsPerPage?: int, email?: string, company?: string, firstname?: string, lastname?: string | - | `Page<Customer-customer.read>` | `list_store_customers` |
| `create` | `$em->stores('storeResourceId')->customers->create($body, disableDoubleOptIn: true, disableWelcomeEmail: true, disableSmsDoubleOptIn: true)` | `POST` | `/stores/{storeResourceId}/customers` | disableDoubleOptIn?: bool, disableWelcomeEmail?: bool, disableSmsDoubleOptIn?: bool | `Customer-customer.create` | `Customer-customer.read` | `create_store_customer` |
| `get` | `$em->stores('storeResourceId')->customers->get('resourceId')` | `GET` | `/stores/{storeResourceId}/customers/{resourceId}` | - | - | `Customer-customer.read` | `get_store_customer` |
| `update` | `$em->stores('storeResourceId')->customers->update('resourceId', $body)` | `PUT` | `/stores/{storeResourceId}/customers/{resourceId}` | - | `Customer-customer.update` | `Customer-customer.read` | `update_store_customer` |
| `delete` | `$em->stores('storeResourceId')->customers->delete('resourceId', unsubscribe: true)` | `DELETE` | `/stores/{storeResourceId}/customers/{resourceId}` | unsubscribe?: bool | - | `void` | `delete_store_customer` |

### <a id="stores.orders"></a>`stores.orders`

- Access: `$em->stores('storeResourceId')->orders`
- API path: `/stores/{storeResourceId}/orders`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->stores('storeResourceId')->orders->list($query)` | `GET` | `/stores/{storeResourceId}/orders` | page?: int, itemsPerPage?: int | - | `Page<Order-order.read>` | `list_store_orders` |
| `create` | `$em->stores('storeResourceId')->orders->create($body)` | `POST` | `/stores/{storeResourceId}/orders` | - | `Order-order.create` | `Order-order.read` | `create_store_order` |
| `get` | `$em->stores('storeResourceId')->orders->get('resourceId')` | `GET` | `/stores/{storeResourceId}/orders/{resourceId}` | - | - | `Order-order.read` | `get_store_order` |
| `update` | `$em->stores('storeResourceId')->orders->update('resourceId', $body)` | `PUT` | `/stores/{storeResourceId}/orders/{resourceId}` | - | `Order-order.update` | `Order-order.read` | `update_store_order` |
| `delete` | `$em->stores('storeResourceId')->orders->delete('resourceId')` | `DELETE` | `/stores/{storeResourceId}/orders/{resourceId}` | - | - | `void` | `delete_store_order` |
| `cancel` | `$em->stores('storeResourceId')->orders->cancel('resourceId', $body)` | `PUT` | `/stores/{storeResourceId}/orders/{resourceId}/actions/cancel_order` | - | `OrderResource-order.cancel_order` | `OrderResource-order.read` | `cancel_order` |
| `import` | `$em->stores('storeResourceId')->orders->import($body)` | `POST` | `/stores/{storeResourceId}/orders/import` | - | `Order-order.import` | `Order-order.read` | `import_order` |
| `pay` | `$em->stores('storeResourceId')->orders->pay('resourceId', $body)` | `PUT` | `/stores/{storeResourceId}/orders/{resourceId}/actions/pay_order` | - | `OrderResource-order.pay_order` | `OrderResource-order.read` | `pay_order` |
| `process` | `$em->stores('storeResourceId')->orders->process('resourceId', $body)` | `PUT` | `/stores/{storeResourceId}/orders/{resourceId}/actions/process_order` | - | `OrderResource-order.process_order` | `OrderResource-order.read` | `process_order` |
| `refund` | `$em->stores('storeResourceId')->orders->refund('resourceId', $body)` | `PUT` | `/stores/{storeResourceId}/orders/{resourceId}/actions/refund_order` | - | `OrderResource-order.refund_order` | `OrderResource-order.read` | `refund_order` |
| `ship` | `$em->stores('storeResourceId')->orders->ship('resourceId', $body)` | `PUT` | `/stores/{storeResourceId}/orders/{resourceId}/actions/ship_order` | - | `OrderResource-order.ship_order` | `OrderResource-order.read` | `ship_order` |

### <a id="stores.products"></a>`stores.products`

- Access: `$em->stores('storeResourceId')->products`
- API path: `/stores/{storeResourceId}/products`
- Child resources: `variants`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->stores('storeResourceId')->products->list($query)` | `GET` | `/stores/{storeResourceId}/products` | page?: int, itemsPerPage?: int | - | `Page<Product-product.read>` | `list_store_products` |
| `create` | `$em->stores('storeResourceId')->products->create($body)` | `POST` | `/stores/{storeResourceId}/products` | - | `Product-product.create` | `Product-product.read` | `create_store_product` |
| `get` | `$em->stores('storeResourceId')->products->get('resourceId')` | `GET` | `/stores/{storeResourceId}/products/{resourceId}` | - | - | `Product-product.read` | `get_store_product` |
| `update` | `$em->stores('storeResourceId')->products->update('resourceId', $body)` | `PUT` | `/stores/{storeResourceId}/products/{resourceId}` | - | `Product-product.update` | `Product-product.read` | `update_store_product` |
| `delete` | `$em->stores('storeResourceId')->products->delete('resourceId')` | `DELETE` | `/stores/{storeResourceId}/products/{resourceId}` | - | - | `void` | `delete_store_product` |

### <a id="stores.products.variants"></a>`stores.products.variants`

- Access: `$em->stores('storeResourceId')->products('productResourceId')->variants`
- API path: `/stores/{storeResourceId}/products/{productResourceId}/variants`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->stores('storeResourceId')->products('productResourceId')->variants->list($query)` | `GET` | `/stores/{storeResourceId}/products/{productResourceId}/variants` | page?: int, itemsPerPage?: int | - | `Page<Variant-variant.read>` | `list_product_variants` |
| `create` | `$em->stores('storeResourceId')->products('productResourceId')->variants->create($body)` | `POST` | `/stores/{storeResourceId}/products/{productResourceId}/variants` | - | `Variant-variant.create` | `Variant-variant.read` | `create_product_variant` |
| `get` | `$em->stores('storeResourceId')->products('productResourceId')->variants->get('resourceId')` | `GET` | `/stores/{storeResourceId}/products/{productResourceId}/variants/{resourceId}` | - | - | `Variant-variant.read` | `get_product_variant` |
| `update` | `$em->stores('storeResourceId')->products('productResourceId')->variants->update('resourceId', $body)` | `PUT` | `/stores/{storeResourceId}/products/{productResourceId}/variants/{resourceId}` | - | `Variant-variant.update` | `Variant-variant.read` | `update_product_variant` |
| `delete` | `$em->stores('storeResourceId')->products('productResourceId')->variants->delete('resourceId')` | `DELETE` | `/stores/{storeResourceId}/products/{productResourceId}/variants/{resourceId}` | - | - | `void` | `delete_product_variant` |

### <a id="support"></a>`support`

- Access: `$em->support`
- API path: `/support`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `listTickets` | `$em->support->listTickets($query)` | `GET` | `/support/tickets` | page?: int, itemsPerPage?: int | - | `Page<SupportTicket-support_ticket.read>` | `list_support_tickets` |
| `createTickets` | `$em->support->createTickets($body)` | `POST` | `/support/tickets` | - | `SupportTicket.SupportTicketInput` | `SupportTicket-support_ticket.read` | `create_support_ticket` |

### <a id="templates"></a>`templates`

- Access: `$em->templates`
- API path: `/templates`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->templates->list($query)` | `GET` | `/templates` | page?: int, itemsPerPage?: int, title?: string, type?: string | - | `Page<Template-template.read>` | `list_templates` |
| `create` | `$em->templates->create($body)` | `POST` | `/templates` | - | `Template-template.write` | `Template-template.read` | `create_template` |
| `get` | `$em->templates->get('uuid')` | `GET` | `/templates/{uuid}` | - | - | `Template-template.read_template.read.detail` | `get_template` |
| `update` | `$em->templates->update('uuid', $body)` | `PUT` | `/templates/{uuid}` | - | `Template-template.write` | `Template-template.read` | `update_template` |
| `delete` | `$em->templates->delete('uuid')` | `DELETE` | `/templates/{uuid}` | - | - | `void` | `delete_template` |
| `regenerateSimpleJson` | `$em->templates->regenerateSimpleJson('uuid')` | `POST` | `/templates/{uuid}/actions/regenerate_simple_json` | - | - | `Template-template.read` | `regenerate_template_simple_json` |
| `sendTest` | `$em->templates->sendTest('uuid', $body)` | `PUT` | `/templates/{uuid}/actions/send_test` | - | `Template.TemplateSendTestInput-template.write_send_test` | `array` | `template_send_test` |

### <a id="templatesSchema"></a>`templatesSchema`

- Access: `$em->templatesSchema`
- API path: `/templates_schema`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `get` | `$em->templatesSchema->get()` | `GET` | `/templates_schema` | - | - | `TemplateSchema` | `get_template_schema` |

### <a id="themeIndustries"></a>`themeIndustries`

- Access: `$em->themeIndustries`
- API path: `/theme_industries`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->themeIndustries->list($query)` | `GET` | `/theme_industries` | page?: int, itemsPerPage?: int | - | `Page<ThemeIndustry-theme_industry.read>` | `list_theme_industries` |

### <a id="themes"></a>`themes`

- Access: `$em->themes`
- API path: `/themes`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->themes->list($query)` | `GET` | `/themes` | page?: int, itemsPerPage?: int, title?: string, types?: string, industries?: string, requiresPro?: bool, isNew?: bool, order[created_at]?: string | - | `Page<Theme-theme.read>` | `list_themes` |
| `get` | `$em->themes->get('uuid')` | `GET` | `/themes/{uuid}` | - | - | `Theme-theme.read` | `get_theme` |
| `createTemplate` | `$em->themes->createTemplate('uuid', $body)` | `POST` | `/themes/{uuid}/actions/create_template` | - | `Theme.CreateTemplateFromThemeInput-theme.write` | `Theme.TemplateResource-template.read` | `create_template_from_theme` |

### <a id="themeTypes"></a>`themeTypes`

- Access: `$em->themeTypes`
- API path: `/theme_types`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->themeTypes->list($query)` | `GET` | `/theme_types` | page?: int, itemsPerPage?: int | - | `Page<ThemeType-theme_type.read>` | `list_theme_types` |

### <a id="treatmentPurposes"></a>`treatmentPurposes`

- Access: `$em->treatmentPurposes`
- API path: `/treatment_purposes`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->treatmentPurposes->list($query)` | `GET` | `/treatment_purposes` | page?: int, itemsPerPage?: int | - | `Page<TreatmentPurpose-treatment_purpose.read>` | `list_treatment_purposes` |
| `create` | `$em->treatmentPurposes->create($body)` | `POST` | `/treatment_purposes` | - | `TreatmentPurpose-treatment_purpose.write` | `TreatmentPurpose-treatment_purpose.read` | `create_treatment_purpose` |
| `get` | `$em->treatmentPurposes->get('uuid')` | `GET` | `/treatment_purposes/{uuid}` | - | - | `TreatmentPurpose-treatment_purpose.read` | `get_treatment_purpose` |
| `update` | `$em->treatmentPurposes->update('uuid', $body)` | `PUT` | `/treatment_purposes/{uuid}` | - | `TreatmentPurpose-treatment_purpose.write` | `TreatmentPurpose-treatment_purpose.read` | `update_treatment_purpose` |
| `delete` | `$em->treatmentPurposes->delete('uuid')` | `DELETE` | `/treatment_purposes/{uuid}` | - | - | `void` | `delete_treatment_purpose` |

### <a id="webhookConfigs"></a>`webhookConfigs`

- Access: `$em->webhookConfigs`
- API path: `/webhooks`
- Child resources: `webhookEvents`, `webhookRequests`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->webhookConfigs->list($query)` | `GET` | `/webhooks` | page?: int, itemsPerPage?: int, audience?: string | - | `Page<Webhook-webhook.read>` | `list_webhooks` |
| `create` | `$em->webhookConfigs->create($body)` | `POST` | `/webhooks` | - | `Webhook-webhook.write` | `Webhook-webhook.read` | `create_webhook` |
| `get` | `$em->webhookConfigs->get('uuid')` | `GET` | `/webhooks/{uuid}` | - | - | `Webhook-webhook.read` | `get_webhook` |
| `update` | `$em->webhookConfigs->update('uuid', $body)` | `PUT` | `/webhooks/{uuid}` | - | `Webhook-webhook.write` | `Webhook-webhook.read` | `update_webhook` |
| `delete` | `$em->webhookConfigs->delete('uuid')` | `DELETE` | `/webhooks/{uuid}` | - | - | `void` | `delete_webhook` |

### <a id="webhookConfigs.webhookEvents"></a>`webhookConfigs.webhookEvents`

- Access: `$em->webhookConfigs('webhookUuid')->webhookEvents`
- API path: `/webhooks/{webhookUuid}/webhook_events`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->webhookConfigs('webhookUuid')->webhookEvents->list($query)` | `GET` | `/webhooks/{webhookUuid}/webhook_events` | page?: int, itemsPerPage?: int, eventType?: string | - | `Page<WebhookEvent-webhook_event.read>` | `list_webhook_events` |
| `get` | `$em->webhookConfigs('webhookUuid')->webhookEvents->get('uuid')` | `GET` | `/webhooks/{webhookUuid}/webhook_events/{uuid}` | - | - | `WebhookEvent-webhook_event.read` | `get_webhook_event` |

### <a id="webhookConfigs.webhookRequests"></a>`webhookConfigs.webhookRequests`

- Access: `$em->webhookConfigs('webhookUuid')->webhookRequests`
- API path: `/webhooks/{webhookUuid}/webhook_requests`

| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |
|---|---|---|---|---|---|---|---|
| `list` | `$em->webhookConfigs('webhookUuid')->webhookRequests->list($query)` | `GET` | `/webhooks/{webhookUuid}/webhook_requests` | page?: int, itemsPerPage?: int | - | `Page<WebhookRequest-webhook_request.read>` | `list_webhook_requests` |
| `get` | `$em->webhookConfigs('webhookUuid')->webhookRequests->get('uuid')` | `GET` | `/webhooks/{webhookUuid}/webhook_requests/{uuid}` | - | - | `WebhookRequest-webhook_request.read` | `get_webhook_request` |

