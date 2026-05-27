<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Hydra;

use Easymailing\Sdk\Hydra\CollectionParser;
use Easymailing\Sdk\Hydra\EntityParser;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class IriProjectionTest extends TestCase
{
    public function testEntityWithIdAddsIriAndUuid(): void
    {
        $parsed = EntityParser::parse([
            '@id' => '/sms_campaigns/11111111-1111-1111-1111-111111111111',
            '@type' => 'SmsCampaign',
            'title' => 'Promo',
        ]);
        self::assertSame('/sms_campaigns/11111111-1111-1111-1111-111111111111', $parsed['iri']);
        self::assertSame('11111111-1111-1111-1111-111111111111', $parsed['uuid']);
        self::assertArrayNotHasKey('@id', $parsed);
        self::assertArrayNotHasKey('@type', $parsed);
    }

    public function testEntityWithoutIdDoesNotAddIri(): void
    {
        $parsed = EntityParser::parse(['title' => 'no id']);
        self::assertArrayNotHasKey('iri', $parsed);
        self::assertArrayNotHasKey('uuid', $parsed);
    }

    public function testExistingIriInInputIsPreserved(): void
    {
        $parsed = EntityParser::parse([
            '@id' => '/sms_campaigns/aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa',
            'iri' => '/custom/pre-existing',
            'title' => 'Keep iri',
        ]);
        self::assertSame('/custom/pre-existing', $parsed['iri']);
        // uuid still derived because uuid wasn't pre-set
        self::assertSame('aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', $parsed['uuid']);
    }

    public function testExistingUuidInInputIsPreserved(): void
    {
        $parsed = EntityParser::parse([
            '@id' => '/sms_campaigns/bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb',
            'uuid' => 'domain-owned-uuid',
            'title' => 'Keep uuid',
        ]);
        self::assertSame('/sms_campaigns/bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb', $parsed['iri']);
        self::assertSame('domain-owned-uuid', $parsed['uuid']);
    }

    public function testEmptyStringIdOmitsIri(): void
    {
        $parsed = EntityParser::parse(['@id' => '', 'title' => 'x']);
        self::assertArrayNotHasKey('iri', $parsed);
        self::assertArrayNotHasKey('uuid', $parsed);
    }

    /**
     * @dataProvider provideNonStringIds
     * @param mixed $id
     */
    #[DataProvider('provideNonStringIds')]
    public function testNonStringIdOmitsIri(mixed $id): void
    {
        $parsed = EntityParser::parse(['@id' => $id, 'title' => 'x']);
        self::assertArrayNotHasKey('iri', $parsed);
    }

    /** @return iterable<string, array{0: mixed}> */
    public static function provideNonStringIds(): iterable
    {
        yield 'null' => [null];
        yield 'int' => [42];
        yield 'array' => [['/a']];
    }

    public function testNestedEntityGetsItsOwnIri(): void
    {
        $parsed = EntityParser::parse([
            '@id' => '/audiences/cccccccc-cccc-cccc-cccc-cccccccccccc',
            '@type' => 'Audience',
            'title' => 'Outer',
            'preferences' => [
                '@id' => '/audience_preferences/dddddddd-dddd-dddd-dddd-dddddddddddd',
                '@type' => 'AudiencePreferences',
                'sender_name' => 'QA',
            ],
        ]);
        self::assertSame('/audiences/cccccccc-cccc-cccc-cccc-cccccccccccc', $parsed['iri']);
        self::assertIsArray($parsed['preferences']);
        self::assertSame('/audience_preferences/dddddddd-dddd-dddd-dddd-dddddddddddd', $parsed['preferences']['iri']);
        self::assertSame('dddddddd-dddd-dddd-dddd-dddddddddddd', $parsed['preferences']['uuid']);
    }

    public function testArrayOfEntitiesEachGetsIri(): void
    {
        $parsed = EntityParser::parse([
            '@id' => '/audiences/eeeeeeee-eeee-eeee-eeee-eeeeeeeeeeee',
            'title' => 'Audience',
            'groups' => [
                ['@id' => '/groups/ffffffff-ffff-ffff-ffff-ffffffffffff', '@type' => 'Group', 'name' => 'Active'],
            ],
        ]);
        self::assertIsArray($parsed['groups']);
        self::assertSame('/groups/ffffffff-ffff-ffff-ffff-ffffffffffff', $parsed['groups'][0]['iri']);
        self::assertSame('ffffffff-ffff-ffff-ffff-ffffffffffff', $parsed['groups'][0]['uuid']);
    }

    public function testOutputNeverIncludesHydraMetadataKeys(): void
    {
        $parsed = EntityParser::parse([
            '@id' => '/x/1',
            '@type' => 'X',
            '@context' => '/ctx/X',
            'name' => 'Test',
        ]);
        self::assertArrayNotHasKey('@id', $parsed);
        self::assertArrayNotHasKey('@type', $parsed);
        self::assertArrayNotHasKey('@context', $parsed);
    }

    public function testCollectionMembersEachGetIriAndUuid(): void
    {
        $parsed = CollectionParser::parse([
            '@id' => '/audiences',
            '@type' => 'hydra:Collection',
            'hydra:member' => [
                ['@id' => '/audiences/aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', '@type' => 'Audience', 'name' => 'A'],
                ['@id' => '/audiences/bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb', '@type' => 'Audience', 'name' => 'B'],
            ],
            'hydra:totalItems' => 2,
        ]);
        self::assertIsArray($parsed['data']);
        self::assertSame('/audiences/aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', $parsed['data'][0]['iri']);
        self::assertSame('aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa', $parsed['data'][0]['uuid']);
        self::assertSame('/audiences/bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb', $parsed['data'][1]['iri']);
        self::assertSame('bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb', $parsed['data'][1]['uuid']);
    }

    /**
     * Cross-language parity: this same fixture file is consumed by the
     * Node test (`packages/node/test/hydra/iri.test.mjs`). Both must
     * produce identical output for every case.
     */
    public function testMatchesCrossLanguageFixtures(): void
    {
        $path = __DIR__ . '/../../../contract/fixtures/hydra-iri/cases.json';
        $payload = file_get_contents($path);
        self::assertNotFalse($payload, "Cannot read fixture at {$path}");
        $fixture = json_decode($payload, true, flags: JSON_THROW_ON_ERROR);
        self::assertIsArray($fixture);
        self::assertArrayHasKey('cases', $fixture);

        foreach ($fixture['cases'] as $case) {
            $actual = EntityParser::parse($case['input']);
            self::assertEquals($case['expected'], $actual, "case \"{$case['name']}\" mismatch");
        }
    }
}
