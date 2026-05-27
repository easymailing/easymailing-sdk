import { test } from "node:test";
import assert from "node:assert/strict";
import { renderResourceReference } from "../../scripts/generator/render-resource-docs.mjs";

test("renders Node and PHP resource reference docs from the SDK model", () => {
  const nodeDoc = renderResourceReference(sampleModel(), "node");
  const phpDoc = renderResourceReference(sampleModel(), "php");

  assert.match(nodeDoc, /AUTO-GENERATED FROM EASYMAILING OPENAPI/);
  assert.match(nodeDoc, /# Node Resource Reference/);
  assert.match(nodeDoc, /em\.stores\("storeResourceId"\)\.products\("productResourceId"\)\.variants\.list\(query\)/);
  assert.match(nodeDoc, /em\.audiences\("audienceUuid"\)\.members\.addToGroup\("uuid", "groupUuid"\)/);
  assert.match(nodeDoc, /Page<Member-member\.read>/);
  assert.match(nodeDoc, /member_add_from_group/);

  assert.match(phpDoc, /# PHP Resource Reference/);
  assert.match(phpDoc, /\$em->stores\('storeResourceId'\)->products\('productResourceId'\)->variants->list\(\$query\)/);
  assert.match(phpDoc, /\$em->members->search\(email: 'email'\)/);
  assert.match(phpDoc, /Order-order\.write/);
});

function sampleModel() {
  const stringParam = (name) => ({ name, publicName: name, type: "string", required: true });
  const queryParam = (name, type = "string") => ({ name, publicName: name, type, required: false });
  return {
    resources: [
      {
        id: "audiences",
        canonicalName: "audiences",
        publicName: "audiences",
        pathTemplate: "/audiences",
        isSingleton: false,
        parentId: null,
        parentParams: [],
        methods: [],
        children: [],
      },
      {
        id: "audiences.members",
        canonicalName: "members",
        publicName: "members",
        pathTemplate: "/audiences/{audienceUuid}/members",
        isSingleton: false,
        parentId: "audiences",
        parentParams: [stringParam("audienceUuid")],
        methods: [
          {
            operationId: "member_add_from_group",
            publicName: "addToGroup",
            kind: "action",
            httpMethod: "PUT",
            pathTemplate: "/audiences/{audienceUuid}/members/{uuid}/actions/add_to_group/{groupUuid}",
            pathParams: [stringParam("audienceUuid"), stringParam("uuid"), stringParam("groupUuid")],
            queryParams: [],
            requestSchema: null,
            responseSchema: "Member-member.read",
            returnsPage: false,
          },
        ],
        children: [],
      },
      {
        id: "members",
        canonicalName: "members",
        publicName: "members",
        pathTemplate: "/members",
        isSingleton: false,
        parentId: null,
        parentParams: [],
        methods: [
          {
            operationId: "search_member_by_email",
            publicName: "search",
            kind: "custom",
            httpMethod: "GET",
            pathTemplate: "/members/search",
            pathParams: [],
            queryParams: [queryParam("email")],
            requestSchema: null,
            responseSchema: "Member-member.read",
            returnsPage: true,
          },
        ],
        children: [],
      },
      {
        id: "stores",
        canonicalName: "stores",
        publicName: "stores",
        pathTemplate: "/stores",
        isSingleton: false,
        parentId: null,
        parentParams: [],
        methods: [],
        children: [],
      },
      {
        id: "stores.orders",
        canonicalName: "orders",
        publicName: "orders",
        pathTemplate: "/stores/{storeResourceId}/orders",
        isSingleton: false,
        parentId: "stores",
        parentParams: [stringParam("storeResourceId")],
        methods: [
          {
            operationId: "import_order",
            publicName: "import",
            kind: "custom",
            httpMethod: "POST",
            pathTemplate: "/stores/{storeResourceId}/orders/import",
            pathParams: [stringParam("storeResourceId")],
            queryParams: [],
            requestSchema: "Order-order.write",
            responseSchema: "Order-order.read",
            returnsPage: false,
          },
        ],
        children: [],
      },
      {
        id: "stores.products",
        canonicalName: "products",
        publicName: "products",
        pathTemplate: "/stores/{storeResourceId}/products",
        isSingleton: false,
        parentId: "stores",
        parentParams: [stringParam("storeResourceId")],
        methods: [],
        children: [],
      },
      {
        id: "stores.products.variants",
        canonicalName: "variants",
        publicName: "variants",
        pathTemplate: "/stores/{storeResourceId}/products/{productResourceId}/variants",
        isSingleton: false,
        parentId: "stores.products",
        parentParams: [stringParam("storeResourceId"), stringParam("productResourceId")],
        methods: [
          {
            operationId: "list_product_variants",
            publicName: "list",
            kind: "list",
            httpMethod: "GET",
            pathTemplate: "/stores/{storeResourceId}/products/{productResourceId}/variants",
            pathParams: [stringParam("storeResourceId"), stringParam("productResourceId")],
            queryParams: [queryParam("page", "int")],
            requestSchema: null,
            responseSchema: "Variant-variant.read",
            returnsPage: true,
          },
        ],
        children: [],
      },
    ],
  };
}
