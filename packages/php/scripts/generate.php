#!/usr/bin/env php
<?php

declare(strict_types=1);

$here = __DIR__;
$monorepoRoot = dirname($here, 3);
$contract = $monorepoRoot . '/packages/contract/openapi.json';
$outputBase = dirname($here) . '/src/Generated';

if (!is_file($contract)) {
    fwrite(STDERR, "Missing contract at {$contract}\n");
    exit(1);
}

// Clean output dirs (avoid stale files)
foreach (['Dto', 'Enum'] as $sub) {
    $dir = $outputBase . '/' . $sub;
    if (is_dir($dir)) {
        foreach (glob($dir . '/*.php') ?: [] as $file) {
            unlink($file);
        }
    }
}

$generator = $here . '/generate-dtos.php';
$cmd = sprintf(
    '%s %s --input=%s --output=%s --layout=namespaced',
    escapeshellarg(PHP_BINARY),
    escapeshellarg($generator),
    escapeshellarg($contract),
    escapeshellarg($outputBase),
);

passthru($cmd, $exitCode);
exit($exitCode);
