<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasListTest} test cases.
 *
 * Provides representative input/output pairs for the `list` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ListProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum, string, string},
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'suggestions';
            }
        };

        return [
            'enum backed string' => [
                BackedString::VALUE,
                [],
                BackedString::VALUE,
                ' list="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' list="value"',
                'Should return the attribute value after setting it.',
            ],
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
                'suggestions',
                ['list' => 'oldList'],
                'suggestions',
                ' list="suggestions"',
                "Should return new 'list' after replacing the existing 'list' attribute.",
            ],
            'string' => [
                'suggestions',
                [],
                'suggestions',
                ' list="suggestions"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' list="suggestions"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['list' => 'suggestions'],
                '',
                '',
                "Should unset the 'list' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
