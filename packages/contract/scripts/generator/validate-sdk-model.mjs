export function validateSdkModel({ operations, deprecated, sdkMap, model }) {
  const activeIds = new Set(operations.map((operation) => operation.operationId));
  const deprecatedIds = new Set(deprecated.map((operation) => operation.operationId));
  const renderedIds = new Set();

  for (const resource of model.resources) {
    const names = new Set();
    for (const method of resource.methods) {
      if (names.has(method.publicName)) {
        throw new Error(`Method name collision in resource "${resource.id}": ${method.publicName}`);
      }
      names.add(method.publicName);
      renderedIds.add(method.operationId);
    }
  }

  for (const operationId of Object.keys(sdkMap.operations ?? {})) {
    if (deprecatedIds.has(operationId)) {
      throw new Error(`sdk-map.yml references deprecated operation "${operationId}"`);
    }
    if (!activeIds.has(operationId)) {
      throw new Error(`sdk-map.yml references unknown operation "${operationId}"`);
    }
  }

  for (const [operationId, entry] of Object.entries(sdkMap.ignoredOperations ?? {})) {
    if (deprecatedIds.has(operationId)) {
      throw new Error(`sdk-map.yml ignores deprecated operation "${operationId}"`);
    }
    if (!activeIds.has(operationId)) {
      throw new Error(`sdk-map.yml ignores unknown operation "${operationId}"`);
    }
    if (!entry?.reason) {
      throw new Error(`Ignored operation "${operationId}" needs a reason`);
    }
    if (sdkMap.operations?.[operationId]) {
      throw new Error(`Operation "${operationId}" cannot be both mapped and ignored`);
    }
    renderedIds.add(operationId);
  }

  for (const operation of operations) {
    if (!renderedIds.has(operation.operationId)) {
      throw new Error(`Uncovered operation "${operation.operationId}" at ${operation.method} ${operation.path}`);
    }
  }

  return {
    operationCount: operations.length,
    deprecatedCount: deprecated.length,
    resourceCount: model.resources.length,
  };
}
