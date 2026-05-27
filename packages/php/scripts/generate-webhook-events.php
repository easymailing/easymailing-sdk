<?php

declare(strict_types=1);

// Generates src/Generated/Webhooks/WebhookEvents.php from
// packages/contract/webhook-events.json. Emits a final class with one
// `public const` per event_type plus an ::all() listing method.

$cataloguePath = __DIR__.'/../../contract/webhook-events.json';
$outputPath = __DIR__.'/../src/Generated/Webhooks/WebhookEvents.php';

if (!is_file($cataloguePath)) {
    fwrite(STDERR, "Catalogue not found: {$cataloguePath}\n");
    exit(1);
}

$catalogue = json_decode(file_get_contents($cataloguePath), true, flags: JSON_THROW_ON_ERROR);
$events = $catalogue['events'] ?? [];

if (count($events) === 0) {
    fwrite(STDERR, "Catalogue is empty.\n");
    exit(1);
}

usort($events, static fn($a, $b) => strcmp($a['event_type'], $b['event_type']));

$lines = [
    '<?php',
    '',
    '// AUTO-GENERATED FROM packages/contract/webhook-events.json — DO NOT EDIT BY HAND.',
    '// Regenerate with `composer generate:webhooks`.',
    '',
    'declare(strict_types=1);',
    '',
    'namespace Easymailing\\Sdk\\Generated\\Webhooks;',
    '',
    '/**',
    ' * Catalogue of webhook event_type values understood by the upstream API.',
    ' *',
    ' * The constant names match the upstream PHP enum (WebhookEventType::*) so',
    ' * upstream-engineer code can copy-paste constant names verbatim.',
    ' */',
    'final class WebhookEvents',
    '{',
];

foreach ($events as $event) {
    $constName = strtoupper(str_replace(['.', '-'], '_', $event['event_type']));
    $lines[] = sprintf("    public const %s = '%s';", $constName, $event['event_type']);
}

$lines[] = '';
$lines[] = '    /** @return list<string> The full catalogue of known event_type values. */';
$lines[] = '    public static function all(): array';
$lines[] = '    {';
$lines[] = '        return [';
foreach ($events as $event) {
    $lines[] = sprintf("            self::%s,", strtoupper(str_replace(['.', '-'], '_', $event['event_type'])));
}
$lines[] = '        ];';
$lines[] = '    }';
$lines[] = '}';

@mkdir(dirname($outputPath), 0o755, true);
file_put_contents($outputPath, implode("\n", $lines)."\n");
echo 'Wrote '.count($events)." webhook event constants to src/Generated/Webhooks/WebhookEvents.php.\n";
