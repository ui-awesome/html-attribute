<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasForTest} test cases.
 */
final class ForProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum|null, string, string},
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'username email';
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
                ' for="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' for="value"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'string' => [
                'username email',
                [],
                'username email',
                ' for="username email"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' for="username email"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'replace existing' => [
                'username email',
                ['for' => 'old-id'],
                'username email',
                ' for="username email"',
                "Should return new 'for' after replacing the existing 'for' attribute.",
            ],
            'unset with null' => [
                null,
                ['for' => 'username email'],
                null,
                '',
                "Should unset the 'for' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
