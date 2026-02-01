<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasPingTest} test cases.
 *
 * Provides representative input/output pairs for the `ping` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PingProvider
{
    /**
     * @phpstan-return array<string, array{string|null, mixed[], string, string, string}>
     */
    public static function values(): array
    {
        return [
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'https://new.example/track',
                ['ping' => 'https://old.example/track'],
                'https://new.example/track',
                ' ping="https://new.example/track"',
                "Should return new 'ping' after replacing the existing 'ping' attribute.",
            ],
            'string' => [
                'https://example.com/track',
                [],
                'https://example.com/track',
                ' ping="https://example.com/track"',
                'Should return the attribute value after setting it.',
            ],
            'string with multiple urls' => [
                'https://a.example/track https://b.example/track',
                [],
                'https://a.example/track https://b.example/track',
                ' ping="https://a.example/track https://b.example/track"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['ping' => 'https://example.com/track'],
                '',
                '',
                "Should unset the 'ping' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
