---
"@easymailing/sdk": minor
---

Expose Customer `phone` field and the `?phone=` query filter on the
ecommerce customers endpoint.

`components["schemas"]["Customer-customer.read"]` now includes
`phone?: string` (E.164 format, e.g. `+34612345678`). The same field
is available on `Customer-customer.create` and `Customer-customer.update`
for write operations.

`em.stores(storeId).customers.list({ phone: "+34..." })` now type-checks
because `operations["list_store_customers"].parameters.query` declares
`phone` as a filter alongside the existing `email`, `firstname`,
`lastname`, `company` filters.

Sync from upstream API; non-breaking minor.
