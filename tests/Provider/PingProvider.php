<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasPingTest} test cases.
 */
final class PingProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum|null, string, string}
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'https://example.com/track';
            }
        };

        return [
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'enum backed string' => [
                BackedString::VALUE,
                [],
                BackedString::VALUE,
                ' ping="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' ping="value"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                null,
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
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' ping="https://example.com/track"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['ping' => 'https://example.com/track'],
                null,
                '',
                "Should unset the 'ping' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
