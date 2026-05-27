<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Webhooks;

use Easymailing\Sdk\Exception\MalformedWebhookException;
use Easymailing\Sdk\Webhooks\EventParser;
use Easymailing\Sdk\Webhooks\SignatureVerifier;
use PHPUnit\Framework\TestCase;

final class WebhooksTest extends TestCase
{
    private const SECRET = 'test-secret';
    private const PAYLOAD = '{"event_type":"member.subscribed","data":{"email":"a@x"}}';

    private function sign(string $payload, string $secret): string
    {
        return 'sha256=' . hash_hmac('sha256', $payload, $secret);
    }

    public function testVerifyAcceptsValidSignature(): void
    {
        self::assertTrue(SignatureVerifier::verify(self::PAYLOAD, $this->sign(self::PAYLOAD, self::SECRET), self::SECRET));
    }

    public function testVerifyRejectsTamperedPayload(): void
    {
        $sig = $this->sign(self::PAYLOAD, self::SECRET);
        self::assertFalse(SignatureVerifier::verify(self::PAYLOAD . 'x', $sig, self::SECRET));
    }

    public function testVerifyRejectsWrongPrefix(): void
    {
        self::assertFalse(SignatureVerifier::verify(self::PAYLOAD, 'nonsense', self::SECRET));
    }

    public function testVerifyRejectsNonHex(): void
    {
        self::assertFalse(SignatureVerifier::verify(self::PAYLOAD, 'sha256=zzznothex', self::SECRET));
    }

    public function testVerifyRejectsWrongSecret(): void
    {
        $sig = $this->sign(self::PAYLOAD, self::SECRET);
        self::assertFalse(SignatureVerifier::verify(self::PAYLOAD, $sig, 'wrong-secret'));
    }

    public function testVerifyCaseInsensitive(): void
    {
        $sig = 'sha256=' . strtoupper(hash_hmac('sha256', self::PAYLOAD, self::SECRET));
        self::assertTrue(SignatureVerifier::verify(self::PAYLOAD, $sig, self::SECRET));
    }

    public function testParseEvent(): void
    {
        $event = EventParser::parse('{"event_type":"member.subscribed","webhook_id":"wh-1","data":{"email":"a@x"}}');
        self::assertSame('member.subscribed', $event['event_type']);
        self::assertSame('wh-1', $event['webhook_id']);
        self::assertSame('a@x', $event['data']['email']);
    }

    public function testParseThrowsTypedMalformedWebhookExceptionOnInvalidJson(): void
    {
        $this->expectException(MalformedWebhookException::class);
        EventParser::parse('not json');
    }

    public function testParseThrowsTypedMalformedWebhookExceptionOnMissingEventType(): void
    {
        $this->expectException(MalformedWebhookException::class);
        $this->expectExceptionMessage('event_type');
        EventParser::parse('{"data":{}}');
    }

    public function testParseThrowsOnMissingData(): void
    {
        $this->expectException(MalformedWebhookException::class);
        $this->expectExceptionMessage('data');
        EventParser::parse('{"event_type":"x"}');
    }

    public function testMalformedWebhookExceptionExposesPayload(): void
    {
        try {
            EventParser::parse('not json');
            self::fail('expected MalformedWebhookException');
        } catch (MalformedWebhookException $e) {
            self::assertSame('not json', $e->payload);
        }
    }
}
