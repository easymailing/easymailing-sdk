# OpenAPI → PHP type mapping matrix

Reglas que aplica `scripts/generate-dtos.php` para convertir schemas del contract en clases PHP 8.1+.

Cada fila tiene:
- **Forma OpenAPI** (entrada).
- **Output PHP** (salida).
- **Comentario** (decisiones, casos borde).

## 1. Tipos escalares

| OpenAPI                                       | PHP             |
|-----------------------------------------------|-----------------|
| `{"type": "string"}`                          | `string`        |
| `{"type": "integer"}`                         | `int`           |
| `{"type": "number"}`                          | `float`         |
| `{"type": "number", "format": "float"}`       | `float`         |
| `{"type": "boolean"}`                         | `bool`          |
| `{"type": "string", "format": "date-time"}`   | `\DateTimeImmutable` |
| `{"type": "string", "format": "uuid"}`        | `string`        |
| `{"type": "string", "format": "uri"}`         | `string`        |
| `{"type": "string", "format": "iri-reference"}` | `string`      |
| `{"type": "string", "format": "iri-template"}`  | `string`      |

## 2. Nullable (OpenAPI 3.1)

En 3.1 la nullability se expresa como array de tipos:

| OpenAPI                                          | PHP        |
|--------------------------------------------------|------------|
| `{"type": ["string", "null"]}`                   | `?string`  |
| `{"type": ["integer", "null"]}`                  | `?int`     |
| `{"type": "string"}` (sin null)                  | `string`   |
| `{"anyOf": [{"$ref": "X"}, {"type": "null"}]}`   | `?X`       |
| `{"oneOf": [{"$ref": "X"}, {"type": "null"}]}`   | `?X`       |

## 3. Referencias

| OpenAPI                       | PHP                                 |
|-------------------------------|-------------------------------------|
| `{"$ref": "#/components/schemas/X"}` | clase `X` correspondiente del namespace `Easymailing\Sdk\Generated\Dto\` |

Si `X` tiene caracteres no válidos para nombres PHP (puntos, guiones), aplicar la regla del paso 11.

## 4. Arrays

| OpenAPI                                        | PHP                  |
|------------------------------------------------|----------------------|
| `{"type": "array", "items": {"type": "string"}}` | `string[]` (PHPDoc `@var string[]`) |
| `{"type": "array", "items": {"$ref": "X"}}`    | `X[]` (PHPDoc `@var X[]`)           |

En propiedades, el tipo nativo PHP siempre es `array` y el detalle del elemento va como PHPDoc.

## 5. Enums

| OpenAPI                                                                  | PHP                          |
|--------------------------------------------------------------------------|------------------------------|
| `{"type": "string", "enum": ["a", "b"]}` (inline en propiedad)           | `string` (sin enum dedicado) |
| `{"type": "string", "enum": [...]}` como component schema                | Backed enum string en `Easymailing\Sdk\Generated\Enum\` |
| `{"type": "integer", "enum": [...]}` como component schema               | Backed enum int                       |

Decisión: generamos enum dedicado solo si el schema vive como entrada propia en `components.schemas`. Enums inline en propiedades quedan como `string`/`int` con docstring.

## 6. `oneOf` / `anyOf` (no-nullable)

| OpenAPI                                                | PHP              |
|--------------------------------------------------------|------------------|
| `{"oneOf": [{"$ref": "A"}, {"$ref": "B"}]}`            | `A\|B` (union nativo PHP 8) |
| `{"anyOf": [{"$ref": "A"}, {"type": "string"}]}`       | `A\|string`      |

PHP 8.0+ soporta union types nativos. Para tres o más opciones, generar union completo.

## 7. `allOf`

| OpenAPI                                                | PHP                  |
|--------------------------------------------------------|----------------------|
| `{"allOf": [{"$ref": "A"}, {"$ref": "B"}]}`            | Merge de campos en una sola clase final |

No usamos herencia para `allOf`; aplanamos las propiedades porque es más predecible y porque PHP no soporta múltiple herencia.

## 8. Schemas Hydra duplicados (`Foo.jsonld-version`)

La API genera dos variantes de cada schema:
- `Audience-audience.read` (vanilla JSON)
- `Audience.jsonld-audience.read` (con `@id`, `@type`, `@context`)

Generamos clase para **ambas variantes**. El nombre PHP es el original con sustituciones de caracteres (paso 11). El runtime del SDK (en Plans 3 y 4) elegirá cuál usar según el `Accept` header.

## 9. `additionalProperties`

| OpenAPI                                                | PHP              |
|--------------------------------------------------------|------------------|
| `{"type": "object", "additionalProperties": true}`     | `array` (sin DTO dedicado) |
| `{"type": "object", "additionalProperties": {...}}`    | `array` con docstring del tipo de valor |

No generamos clase para objects con `additionalProperties` activado, porque por definición son maps dinámicos.

## 10. Objetos con `properties` vacío `{}`

Si un schema tiene `type: "object"` sin `properties` o con `properties: {}`, generamos una clase sin propiedades (placeholder). Servirá como marker para el runtime.

## 11. Naming: caracteres especiales

Los nombres de schemas en este contract incluyen `.`, `-` y `_`. Reglas de transformación a PHP:

- `.` → `_`
- `-` → `_`
- Mantener mayúsculas y minúsculas tal cual (los schemas usan PascalCase).

Ejemplos:
- `Audience-audience.read` → `Audience_audience_read`
- `BatchOperationResource.BatchOperationErrorsResource-batch_operation_errors.read` → `BatchOperationResource_BatchOperationErrorsResource_batch_operation_errors_read`

Los nombres serán largos pero predecibles. El runtime mapea por nombre exacto del schema, no por convención inferida.

## 12. Casos NO soportados en v1

Hechos explícitos:
- **Discriminator** (`discriminator` en `oneOf`/`anyOf`): si el contract no lo usa, lo omitimos. Si aparece, registramos warning y generamos union plano.
- **Schemas circulares**: el generador detecta y emite warning. Como PHP soporta type hints recursivos sin problema, no debería romper.
- **`not`**: no soportado. Si aparece, abortar con error.

## 13. Output común

Todas las clases generadas:
- Tienen header `// AUTO-GENERATED... DO NOT EDIT BY HAND.`
- Son `final class`.
- Constructor con `public readonly` properties (constructor property promotion).
- Método `fromArray(array $data): self`.
- Método `toArray(): array`.
- Método `with(...$fields): self` (immutable copy con named args).
