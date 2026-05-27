#!/usr/bin/env php
<?php

/**
 * Generate PHP DTOs from an OpenAPI 3.1 contract.
 *
 * Usage:
 *   php generate-dtos.php --input=<openapi.json> --output=<dir> [--layout=flat|namespaced]
 *
 * See docs/type-mapping.md for the mapping rules implemented here.
 */

declare(strict_types=1);

$opts = getopt('', ['input:', 'output:', 'layout::']);
if (!isset($opts['input'], $opts['output'])) {
    fwrite(STDERR, "Usage: generate-dtos.php --input=<openapi.json> --output=<dir> [--layout=flat|namespaced]\n");
    exit(1);
}

$inputPath = $opts['input'];
$outputDir = $opts['output'];
$layout = $opts['layout'] ?? 'flat';

if (!is_file($inputPath)) {
    fwrite(STDERR, "Input file not found: {$inputPath}\n");
    exit(1);
}

if (!is_dir($outputDir)) {
    mkdir($outputDir, 0o755, true);
}

$json = file_get_contents($inputPath);
if ($json === false) {
    fwrite(STDERR, "Cannot read input file\n");
    exit(1);
}

$spec = json_decode($json, true, flags: JSON_THROW_ON_ERROR);
$schemas = $spec['components']['schemas'] ?? [];

if (empty($schemas)) {
    fwrite(STDERR, "No schemas found in components.schemas\n");
    exit(1);
}

$dtoDir = $layout === 'namespaced' ? $outputDir . '/Dto' : $outputDir;
$enumDir = $layout === 'namespaced' ? $outputDir . '/Enum' : $outputDir;

if (!is_dir($dtoDir)) {
    mkdir($dtoDir, 0o755, true);
}
if ($layout === 'namespaced' && !is_dir($enumDir)) {
    mkdir($enumDir, 0o755, true);
}

$dtoNamespace = 'Easymailing\\Sdk\\Generated\\Dto';
$enumNamespace = 'Easymailing\\Sdk\\Generated\\Enum';

// First pass: build set of enum schema names so $ref resolution can distinguish enums from DTOs.
$enumSchemas = [];
foreach ($schemas as $name => $schema) {
    $type = $schema['type'] ?? null;
    if (isset($schema['enum']) && in_array($type, ['string', 'integer'], true)) {
        $enumSchemas[$name] = true;
    }
}

$ctx = [
    'enums' => $enumSchemas,
    'schemas' => $schemas,
    'enumNamespace' => $enumNamespace,
];

// Second pass: generate files.
foreach ($schemas as $name => $schema) {
    $type = $schema['type'] ?? null;
    $className = phpName($name);

    if (isset($enumSchemas[$name])) {
        $code = generateEnum($enumNamespace, $className, $type, $schema['enum']);
        file_put_contents($enumDir . '/' . $className . '.php', $code);
        continue;
    }

    if (isset($schema['allOf'])) {
        [$properties, $required] = mergeAllOf($schema['allOf'], $schemas);
        $code = generateClass($dtoNamespace, $className, $properties, $required, $ctx);
        file_put_contents($dtoDir . '/' . $className . '.php', $code);
        continue;
    }

    if ($type !== 'object') {
        continue;
    }

    $properties = $schema['properties'] ?? [];
    $required = $schema['required'] ?? [];
    $code = generateClass($dtoNamespace, $className, $properties, $required, $ctx);
    file_put_contents($dtoDir . '/' . $className . '.php', $code);
}

function phpName(string $name): string
{
    return preg_replace('/[^A-Za-z0-9_]/', '_', $name);
}

/**
 * @return array{0: array<string, mixed>, 1: list<string>}
 */
function mergeAllOf(array $members, array $allSchemas): array
{
    $mergedProps = [];
    $mergedRequired = [];
    foreach ($members as $member) {
        if (isset($member['$ref'])) {
            $refName = basename($member['$ref']);
            $resolved = $allSchemas[$refName] ?? null;
            if ($resolved === null) {
                continue;
            }
            if (isset($resolved['allOf'])) {
                [$props, $req] = mergeAllOf($resolved['allOf'], $allSchemas);
                $mergedProps += $props;
                $mergedRequired = array_merge($mergedRequired, $req);
                continue;
            }
            $mergedProps += $resolved['properties'] ?? [];
            $mergedRequired = array_merge($mergedRequired, $resolved['required'] ?? []);
            continue;
        }
        if (isset($member['allOf'])) {
            [$props, $req] = mergeAllOf($member['allOf'], $allSchemas);
            $mergedProps += $props;
            $mergedRequired = array_merge($mergedRequired, $req);
            continue;
        }
        $mergedProps += $member['properties'] ?? [];
        $mergedRequired = array_merge($mergedRequired, $member['required'] ?? []);
    }
    return [$mergedProps, array_values(array_unique($mergedRequired))];
}

/**
 * Analyze a property schema. The `from` callable receives ($key, $keyMayBeMissing): the
 * value access needs a presence guard when the key is optional. The `to` callable receives
 * ($prop, $valueMayBeNull): the serialization needs a null guard when the value can be null.
 *
 * These are independent: a required+nullable field has the key always present but the
 * value may be null.
 *
 * @return array{
 *   typeHint: string,
 *   nullable: bool,
 *   docHint: ?string,
 *   from: callable(string, bool): string,
 *   to: callable(string, bool): string,
 * }
 */
function analyzeProperty(array $schema, array $ctx): array
{
    // $ref → enum or DTO. The surrounding schema's `type` may add `null` (P0-2).
    if (isset($schema['$ref'])) {
        $refName = basename($schema['$ref']);
        $phpRef = phpName($refName);
        // OpenAPI 3.1 lets a property combine $ref with type:["...","null"] to declare nullability.
        $explicitNullable = is_array($schema['type'] ?? null)
            && in_array('null', $schema['type'], true);

        if (isset($ctx['enums'][$refName])) {
            $fqn = '\\' . $ctx['enumNamespace'] . '\\' . $phpRef;
            return [
                'typeHint' => ($explicitNullable ? '?' : '') . $fqn,
                'nullable' => $explicitNullable,
                'docHint' => null,
                'from' => function (string $key, bool $keyMayBeMissing) use ($fqn, $explicitNullable) {
                    $inner = "{$fqn}::from(\$data['{$key}'])";
                    // Either missing key (optional) or schema-nullable value → guard with isset (false on both missing and null).
                    if ($keyMayBeMissing || $explicitNullable) {
                        return "isset(\$data['{$key}']) ? {$inner} : null";
                    }
                    return $inner;
                },
                'to' => function (string $phpProp, bool $valueMayBeNull) use ($explicitNullable) {
                    return ($valueMayBeNull || $explicitNullable)
                        ? "\$this->{$phpProp}?->value"
                        : "\$this->{$phpProp}->value";
                },
            ];
        }
        return [
            'typeHint' => ($explicitNullable ? '?' : '') . $phpRef,
            'nullable' => $explicitNullable,
            'docHint' => null,
            'from' => function (string $key, bool $keyMayBeMissing) use ($phpRef, $explicitNullable) {
                $inner = "{$phpRef}::fromArray(\$data['{$key}'])";
                if ($keyMayBeMissing || $explicitNullable) {
                    return "isset(\$data['{$key}']) ? {$inner} : null";
                }
                return $inner;
            },
            'to' => function (string $phpProp, bool $valueMayBeNull) use ($explicitNullable) {
                return ($valueMayBeNull || $explicitNullable)
                    ? "\$this->{$phpProp}?->toArray()"
                    : "\$this->{$phpProp}->toArray()";
            },
        ];
    }

    // oneOf / anyOf
    if (isset($schema['oneOf']) || isset($schema['anyOf'])) {
        $options = $schema['oneOf'] ?? $schema['anyOf'];
        $nullable = false;
        $nonNullOptions = [];
        foreach ($options as $opt) {
            if (($opt['type'] ?? null) === 'null') {
                $nullable = true;
                continue;
            }
            $nonNullOptions[] = $opt;
        }

        // Single non-null option + null → wrap as nullable. value is always nullable.
        if (count($nonNullOptions) === 1 && $nullable) {
            $inner = analyzeProperty($nonNullOptions[0], $ctx);
            $innerHint = $inner['typeHint'];
            $innerFrom = $inner['from'];
            $innerTo = $inner['to'];
            return [
                'typeHint' => '?' . $innerHint,
                'nullable' => true,
                'docHint' => null,
                // The schema says null is allowed: always guard from with null check.
                'from' => function (string $key, bool $keyMayBeMissing) use ($innerFrom) {
                    // If key may be missing OR value may be null, both need handling.
                    // We unify with isset(): isset() is false for missing AND for null values.
                    $inner = $innerFrom($key, false);
                    return "isset(\$data['{$key}']) ? {$inner} : null";
                },
                'to' => fn(string $phpProp, bool $valueMayBeNull) => $innerTo($phpProp, true),
            ];
        }

        // Multi-option without discriminator: cannot safely hydrate.
        // Detect whether any non-DTO primitive shows up; if so, type hint must be `mixed`
        // (P0-1: Hydra @context is oneOf:[string,object], and a real wire value is a string).
        $hasPrimitive = false;
        foreach ($nonNullOptions as $opt) {
            if (isset($opt['$ref'])) {
                continue;
            }
            $t = $opt['type'] ?? null;
            if (in_array($t, ['string', 'integer', 'number', 'boolean', 'mixed'], true)) {
                $hasPrimitive = true;
                break;
            }
            if ($t === null) {
                // Untyped option — treat as primitive/mixed for safety.
                $hasPrimitive = true;
                break;
            }
        }

        $hints = array_map(fn($o) => analyzeProperty($o, $ctx)['typeHint'], $nonNullOptions);
        $unionDoc = implode('|', $hints) . ($nullable ? '|null' : '');

        if ($hasPrimitive) {
            // `mixed` already includes null; can't be prefixed with `?`.
            return [
                'typeHint' => 'mixed',
                'nullable' => $nullable,
                'docHint' => "/** @var mixed actual: {$unionDoc} (hydrated as raw value — no discriminator) */",
                'from' => fn(string $key, bool $keyMayBeMissing) => $keyMayBeMissing ? "\$data['{$key}'] ?? null" : "\$data['{$key}']",
                'to' => fn(string $phpProp, bool $valueMayBeNull) => "\$this->{$phpProp}",
            ];
        }

        return [
            'typeHint' => $nullable ? '?array' : 'array',
            'nullable' => $nullable,
            'docHint' => "/** @var array<string,mixed>|null actual: {$unionDoc} (hydrated as raw array — no discriminator) */",
            'from' => fn(string $key, bool $keyMayBeMissing) => $keyMayBeMissing ? "\$data['{$key}'] ?? null" : "\$data['{$key}']",
            'to' => fn(string $phpProp, bool $valueMayBeNull) => "\$this->{$phpProp}",
        ];
    }

    // Array
    if (($schema['type'] ?? null) === 'array') {
        $items = $schema['items'] ?? [];
        $itemAnalysis = analyzeProperty($items, $ctx);
        $itemType = $itemAnalysis['typeHint'];
        $docHint = "/** @var {$itemType}[] */";

        if (isset($items['$ref']) && isset($ctx['enums'][basename($items['$ref'])])) {
            $fqn = $itemAnalysis['typeHint'];
            return [
                'typeHint' => 'array',
                'nullable' => false,
                'docHint' => $docHint,
                'from' => function (string $key, bool $keyMayBeMissing) use ($fqn) {
                    $inner = "array_map(fn(\$x) => {$fqn}::from(\$x), \$data['{$key}'])";
                    return $keyMayBeMissing ? "isset(\$data['{$key}']) ? {$inner} : null" : $inner;
                },
                'to' => function (string $phpProp, bool $valueMayBeNull) {
                    $inner = "array_map(fn(\$x) => \$x->value, \$this->{$phpProp})";
                    return $valueMayBeNull ? "\$this->{$phpProp} !== null ? {$inner} : null" : $inner;
                },
            ];
        }

        if (isset($items['$ref'])) {
            $refName = phpName(basename($items['$ref']));
            return [
                'typeHint' => 'array',
                'nullable' => false,
                'docHint' => $docHint,
                'from' => function (string $key, bool $keyMayBeMissing) use ($refName) {
                    $inner = "array_map(fn(\$x) => {$refName}::fromArray(\$x), \$data['{$key}'])";
                    return $keyMayBeMissing ? "isset(\$data['{$key}']) ? {$inner} : null" : $inner;
                },
                'to' => function (string $phpProp, bool $valueMayBeNull) {
                    $inner = "array_map(fn(\$x) => \$x->toArray(), \$this->{$phpProp})";
                    return $valueMayBeNull ? "\$this->{$phpProp} !== null ? {$inner} : null" : $inner;
                },
            ];
        }

        // Scalar array
        return [
            'typeHint' => 'array',
            'nullable' => false,
            'docHint' => $docHint,
            'from' => fn(string $key, bool $keyMayBeMissing) => $keyMayBeMissing ? "\$data['{$key}'] ?? null" : "\$data['{$key}']",
            'to' => fn(string $phpProp, bool $valueMayBeNull) => "\$this->{$phpProp}",
        ];
    }

    // Scalars
    $type = $schema['type'] ?? null;
    $format = $schema['format'] ?? null;
    $intrinsicNullable = false;

    if (is_array($type)) {
        $nonNull = array_values(array_filter($type, fn($t) => $t !== 'null'));
        $intrinsicNullable = count($nonNull) !== count($type);
        $type = count($nonNull) === 1 ? $nonNull[0] : 'mixed';
    }

    $baseType = match ($type) {
        'string' => mapStringFormat($format),
        'integer' => 'int',
        'number' => 'float',
        'boolean' => 'bool',
        'array' => 'array',
        'object' => 'array',
        default => 'mixed',
    };

    $typeHint = ($intrinsicNullable ? '?' : '') . $baseType;

    return [
        'typeHint' => $typeHint,
        'nullable' => $intrinsicNullable,
        'docHint' => null,
        'from' => makeScalarFromExpr($baseType, $intrinsicNullable),
        'to' => makeScalarToExpr($baseType, $intrinsicNullable),
    ];
}

function mapStringFormat(?string $format): string
{
    return match ($format) {
        'date-time', 'datetime' => '\DateTimeImmutable',
        default => 'string',
    };
}

function makeScalarFromExpr(string $baseType, bool $intrinsicNullable): callable
{
    if ($baseType === '\DateTimeImmutable') {
        return function (string $key, bool $keyMayBeMissing) use ($intrinsicNullable) {
            if ($keyMayBeMissing) {
                return "isset(\$data['{$key}']) ? new \\DateTimeImmutable(\$data['{$key}']) : null";
            }
            if ($intrinsicNullable) {
                return "\$data['{$key}'] !== null ? new \\DateTimeImmutable(\$data['{$key}']) : null";
            }
            return "new \\DateTimeImmutable(\$data['{$key}'])";
        };
    }
    return function (string $key, bool $keyMayBeMissing) {
        return $keyMayBeMissing ? "\$data['{$key}'] ?? null" : "\$data['{$key}']";
    };
}

function makeScalarToExpr(string $baseType, bool $intrinsicNullable): callable
{
    if ($baseType === '\DateTimeImmutable') {
        return function (string $phpProp, bool $valueMayBeNull) use ($intrinsicNullable) {
            if ($valueMayBeNull || $intrinsicNullable) {
                return "\$this->{$phpProp}?->format(\\DateTimeInterface::ATOM)";
            }
            return "\$this->{$phpProp}->format(\\DateTimeInterface::ATOM)";
        };
    }
    return fn(string $phpProp, bool $valueMayBeNull) => "\$this->{$phpProp}";
}

/**
 * @param list<string> $required
 */
function generateClass(string $namespace, string $className, array $properties, array $required, array $ctx): string
{
    $constructorParams = [];
    $fromArrayLines = [];
    $toArrayLines = [];
    $withLines = [];

    $requiredSet = array_flip($required);

    // Reorder properties: required first, then optional. Avoids PHP 8.1+ deprecation
    // ("optional parameter declared before required parameter") and is forward-compatible
    // with PHP 9 where it becomes an error.
    $requiredProps = [];
    $optionalProps = [];
    foreach ($properties as $propName => $propSchema) {
        if (isset($requiredSet[$propName])) {
            $requiredProps[$propName] = $propSchema;
        } else {
            $optionalProps[$propName] = $propSchema;
        }
    }
    $orderedProperties = $requiredProps + $optionalProps;

    foreach ($orderedProperties as $propName => $propSchema) {
        $phpProp = phpName($propName);
        $analysis = analyzeProperty($propSchema, $ctx);

        $isRequired = isset($requiredSet[$propName]);
        $intrinsicNullable = $analysis['nullable'] || str_starts_with($analysis['typeHint'], '?');
        $keyMayBeMissing = !$isRequired;
        $valueMayBeNull = !$isRequired || $intrinsicNullable;

        $typeHint = $analysis['typeHint'];
        // `mixed` already includes null in PHP — never prefix it with `?`.
        $isMixed = $typeHint === 'mixed' || $typeHint === '?mixed';
        if ($isMixed) {
            $typeHint = 'mixed';
        } elseif ($valueMayBeNull && !str_starts_with($typeHint, '?')) {
            $typeHint = '?' . $typeHint;
        }

        if ($analysis['docHint'] !== null) {
            $hint = $analysis['docHint'];
            if ($valueMayBeNull && !str_contains($hint, '|null')) {
                $hint = preg_replace('/(@var \S+)/', '$1|null', $hint, 1);
            }
            $constructorParams[] = "        {$hint}";
        }
        $default = !$isRequired ? ' = null' : '';
        $constructorParams[] = "        public readonly {$typeHint} \${$phpProp}{$default},";

        $fromArrayLines[] = "            {$phpProp}: " . $analysis['from']($propName, $keyMayBeMissing) . ',';
        $toArrayLines[] = "            '{$propName}' => " . $analysis['to']($phpProp, $valueMayBeNull) . ',';
        $withLines[] = "            {$phpProp}: array_key_exists('{$phpProp}', \$fields) ? \$fields['{$phpProp}'] : \$this->{$phpProp},";
    }

    $header = "<?php\n\n// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.\n// Run `composer generate` to refresh.\n\ndeclare(strict_types=1);\n\nnamespace {$namespace};\n\n";

    $body = "final class {$className}\n{\n";
    $body .= "    public function __construct(\n";
    $body .= implode("\n", $constructorParams) . "\n";
    $body .= "    ) {\n    }\n\n";
    $body .= "    public static function fromArray(array \$data): self\n    {\n";
    $body .= "        return new self(\n";
    $body .= implode("\n", $fromArrayLines) . "\n";
    $body .= "        );\n    }\n\n";
    $body .= "    public function toArray(): array\n    {\n";
    $body .= "        return [\n";
    $body .= implode("\n", $toArrayLines) . "\n";
    $body .= "        ];\n    }\n\n";
    $body .= "    public function with(mixed ...\$fields): self\n    {\n";
    $body .= "        return new self(\n";
    $body .= implode("\n", $withLines) . "\n";
    $body .= "        );\n    }\n";
    $body .= "}\n";

    return $header . $body;
}

function generateEnum(string $namespace, string $className, string $type, array $values): string
{
    $backingType = $type === 'string' ? 'string' : 'int';
    $header = "<?php\n\n// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.\n// Run `composer generate` to refresh.\n\ndeclare(strict_types=1);\n\nnamespace {$namespace};\n\n";

    $body = "enum {$className}: {$backingType}\n{\n";
    foreach ($values as $value) {
        if ($type === 'string') {
            $caseName = enumCaseName((string) $value);
            $literal = "'" . addslashes((string) $value) . "'";
        } else {
            $caseName = 'Value' . $value;
            $literal = (string) $value;
        }
        $body .= "    case {$caseName} = {$literal};\n";
    }
    $body .= "}\n";

    return $header . $body;
}

function enumCaseName(string $value): string
{
    $clean = preg_replace('/[^A-Za-z0-9]+/', ' ', $value);
    $parts = preg_split('/\s+/', trim($clean));
    $name = implode('', array_map(fn($p) => ucfirst(strtolower($p)), $parts));
    if ($name === '' || ctype_digit($name[0])) {
        $name = '_' . $name;
    }
    return $name;
}
