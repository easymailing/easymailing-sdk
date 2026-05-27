<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Hydra;

use Easymailing\Sdk\Hydra\CollectionParser;
use Easymailing\Sdk\Hydra\EntityParser;
use Easymailing\Sdk\Hydra\IriExtractor;
use PHPUnit\Framework\TestCase;

final class HydraTest extends TestCase
{
    public function testExtractUuidFromSimpleIri(): void
    {
        self::assertSame('abc-123', IriExtractor::extract('/audiences/abc-123'));
    }

    public function testExtractUuidFromNestedIri(): void
    {
        self::assertSame('xyz-789', IriExtractor::extract('/audiences/abc/members/xyz-789'));
    }

    public function testExtractUuidReturnsNullForInvalid(): void
    {
        self::assertNull(IriExtractor::extract(''));
        self::assertNull(IriExtractor::extract('not-an-iri'));
    }

    public function testEntityParserStripsHydraKeys(): void
    {
        $parsed = EntityParser::parse([
            '@id' => '/audiences/abc-123',
            '@type' => 'Audience',
            '@context' => '/contexts/Audience',
            'uuid' => 'abc-123',
            'name' => 'My audience',
        ]);
        self::assertArrayNotHasKey('@id', $parsed);
        self::assertArrayNotHasKey('@type', $parsed);
        self::assertArrayNotHasKey('@context', $parsed);
        self::assertSame('abc-123', $parsed['uuid']);
        self::assertSame('My audience', $parsed['name']);
    }

    public function testEntityParserDerivesUuidFromId(): void
    {
        $parsed = EntityParser::parse([
            '@id' => '/audiences/xyz-456',
            '@type' => 'Audience',
            'name' => 'x',
        ]);
        self::assertSame('xyz-456', $parsed['uuid']);
    }

    public function testEntityParserRecursesIntoNestedObjects(): void
    {
        $parsed = EntityParser::parse([
            '@id' => '/audiences/abc',
            'uuid' => 'abc',
            'preferences' => ['@id' => '/preferences/p1', '@type' => 'Pref', 'lang' => 'es'],
        ]);
        self::assertArrayNotHasKey('@id', $parsed['preferences']);
        self::assertSame('es', $parsed['preferences']['lang']);
    }

    public function testEntityParserRecursesIntoArrays(): void
    {
        $parsed = EntityParser::parse([
            'uuid' => 'abc',
            'members' => [
                ['@id' => '/members/1', 'uuid' => '1', 'email' => 'a@x'],
                ['@id' => '/members/2', 'uuid' => '2', 'email' => 'b@x'],
            ],
        ]);
        self::assertArrayNotHasKey('@id', $parsed['members'][0]);
        self::assertSame('a@x', $parsed['members'][0]['email']);
    }

    public function testCollectionParserMapsMembersAndTotal(): void
    {
        $parsed = CollectionParser::parse([
            '@context' => '/contexts/Audience',
            '@id' => '/audiences',
            '@type' => 'hydra:Collection',
            'hydra:member' => [
                ['@id' => '/audiences/a', '@type' => 'Audience', 'uuid' => 'a', 'name' => 'A'],
                ['@id' => '/audiences/b', '@type' => 'Audience', 'uuid' => 'b', 'name' => 'B'],
            ],
            'hydra:totalItems' => 2,
        ]);
        self::assertCount(2, $parsed['data']);
        self::assertArrayNotHasKey('@id', $parsed['data'][0]);
        self::assertSame('A', $parsed['data'][0]['name']);
        self::assertSame(2, $parsed['total']);
        self::assertSame(1, $parsed['page']);
        self::assertFalse($parsed['hasMore']);
    }

    public function testCollectionParserExtractsPageFromView(): void
    {
        $parsed = CollectionParser::parse([
            'hydra:member' => [],
            'hydra:totalItems' => 100,
            'hydra:view' => [
                '@id' => '/audiences?page=3',
                '@type' => 'hydra:PartialCollectionView',
                'hydra:next' => '/audiences?page=4',
            ],
        ]);
        self::assertSame(3, $parsed['page']);
        self::assertTrue($parsed['hasMore']);
    }

    public function testCollectionParserHasMoreIsFalseWithoutNext(): void
    {
        $parsed = CollectionParser::parse([
            'hydra:member' => [],
            'hydra:totalItems' => 5,
            'hydra:view' => ['@id' => '/audiences?page=1'],
        ]);
        self::assertFalse($parsed['hasMore']);
    }
}
