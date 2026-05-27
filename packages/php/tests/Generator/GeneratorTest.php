<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Generator;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class GeneratorTest extends TestCase
{
    private const FIXTURES_DIR = __DIR__ . '/fixtures';
    private const EXPECTED_DIR = __DIR__ . '/fixtures/expected';
    private const SCRIPT = __DIR__ . '/../../scripts/generate-dtos.php';

    /**
     * @return iterable<string, array{0: string, 1: string}>
     */
    public static function fixtureProvider(): iterable
    {
        $fixtures = glob(self::FIXTURES_DIR . '/*.json') ?: [];
        foreach ($fixtures as $fixture) {
            $name = basename($fixture, '.json');
            yield $name => [$fixture, self::EXPECTED_DIR . '/' . $name];
        }
    }

    #[DataProvider('fixtureProvider')]
    public function testGeneratorProducesExpectedOutput(string $fixtureJson, string $expectedDir): void
    {
        self::assertDirectoryExists($expectedDir, "Expected dir missing: {$expectedDir}");

        $tmpOut = sys_get_temp_dir() . '/em-gen-' . bin2hex(random_bytes(4));
        mkdir($tmpOut, 0o755, true);

        try {
            $cmd = sprintf(
                '%s %s --input=%s --output=%s 2>&1',
                escapeshellarg(PHP_BINARY),
                escapeshellarg(self::SCRIPT),
                escapeshellarg($fixtureJson),
                escapeshellarg($tmpOut),
            );

            exec($cmd, $output, $exitCode);
            self::assertSame(0, $exitCode, "Generator failed:\n" . implode("\n", $output));

            $expectedFiles = glob($expectedDir . '/*.php') ?: [];
            foreach ($expectedFiles as $expectedFile) {
                $name = basename($expectedFile);
                $actual = $tmpOut . '/' . $name;
                self::assertFileExists($actual, "Missing generated file: {$name}");
                self::assertSame(
                    file_get_contents($expectedFile),
                    file_get_contents($actual),
                    "Mismatch in {$name}",
                );
            }

            $actualFiles = array_map('basename', glob($tmpOut . '/*.php') ?: []);
            $expectedNames = array_map('basename', $expectedFiles);
            self::assertEqualsCanonicalizing(
                $expectedNames,
                $actualFiles,
                'Generator produced unexpected files',
            );
        } finally {
            array_map('unlink', glob($tmpOut . '/*') ?: []);
            @rmdir($tmpOut);
        }
    }
}
