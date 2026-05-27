import { test } from "node:test";
import assert from "node:assert/strict";
import { readFileSync } from "node:fs";
import { resolve, dirname } from "node:path";
import { fileURLToPath } from "node:url";
import { readOpenApiOperations } from "../../scripts/generator/read-openapi-operations.mjs";
import { inferRestModel } from "../../scripts/generator/infer-rest-model.mjs";

const here = dirname(fileURLToPath(import.meta.url));
const fixture = (name) => JSON.parse(readFileSync(resolve(here, "fixtures", name), "utf8"));

test("infers CRUD resources", () => {
  const { operations } = readOpenApiOperations(fixture("01-crud.json"));
  const result = inferRestModel(operations, {});
  const things = result.resources.find((r) => r.id === "things");

  assert.ok(things);
  assert.deepEqual(things.methods.map((m) => m.publicName), ["list", "create", "get", "update", "delete"]);
  assert.equal(things.methods.find((m) => m.publicName === "get").pathParams[0].name, "uuid");
});

test("infers nested resources with bound parent params", () => {
  const { operations } = readOpenApiOperations(fixture("04-nested.json"));
  const result = inferRestModel(operations, {});
  const products = result.resources.find((r) => r.id === "stores.products");
  const variants = result.resources.find((r) => r.id === "stores.products.variants");

  assert.ok(products);
  assert.equal(products.parentId, "stores");
  assert.deepEqual(products.parentParams.map((p) => p.name), ["storeResourceId"]);
  assert.ok(variants);
  assert.deepEqual(variants.parentParams.map((p) => p.name), ["storeResourceId", "productResourceId"]);
});

test("infers singleton resources and aliases", () => {
  const aliases = {
    my_suscription: { canonical: "mySubscription" },
    suscription_forms: { canonical: "subscriptionForms" },
  };
  const singletonOps = readOpenApiOperations(fixture("07-singletons.json")).operations;
  const aliasOps = readOpenApiOperations(fixture("08-aliases.json")).operations;

  const singleton = inferRestModel(singletonOps, aliases).resources.find((r) => r.id === "mySubscription");
  const forms = inferRestModel(aliasOps, aliases).resources.find((r) => r.id === "audiences.subscriptionForms");

  assert.ok(singleton);
  assert.equal(singleton.isSingleton, true);
  assert.deepEqual(singleton.methods.map((m) => m.publicName), ["get"]);
  assert.ok(forms);
  assert.equal(forms.publicName, "subscriptionForms");
});

test("literal suffix collections without parent params stay reachable on the parent resource", () => {
  const { operations } = readOpenApiOperations({
    openapi: "3.1.0",
    info: { title: "Test", version: "1.0" },
    paths: {
      "/support/tickets": {
        get: {
          operationId: "list_support_tickets",
          parameters: [
            { name: "page", in: "query", schema: { type: "integer" } },
          ],
          responses: {
            200: {
              content: {
                "application/json": {
                  schema: { type: "array", items: { $ref: "#/components/schemas/SupportTicket-support_ticket.read" } },
                },
              },
            },
          },
        },
        post: {
          operationId: "create_support_ticket",
          requestBody: {
            content: {
              "application/json": {
                schema: { $ref: "#/components/schemas/SupportTicket.SupportTicketInput" },
              },
            },
          },
          responses: {
            201: {
              content: {
                "application/json": {
                  schema: { $ref: "#/components/schemas/SupportTicket-support_ticket.read" },
                },
              },
            },
          },
        },
      },
    },
  });

  const result = inferRestModel(operations, {});
  const support = result.resources.find((resource) => resource.id === "support");

  assert.ok(support);
  assert.deepEqual(support.methods.map((method) => method.publicName), ["listTickets", "createTickets"]);
  assert.equal(result.resources.find((resource) => resource.id === "support.tickets"), undefined);
});
