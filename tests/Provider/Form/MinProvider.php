<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Form;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Form\HasMinTest} test cases.
 *
 * Provides representative input/output pairs for the `min` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MinProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{float|int|string|Stringable|UnitEnum|null, mixed[], float|int|string|Stringable|UnitEnum|null, string, string},
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return '2024-01-01';
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
                ' min="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' min="value"',
                'Should return the attribute value after setting it.',
            ],
            'float' => [
                1.5,
                [],
                1.5,
                ' min="1.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                0,
                [],
                0,
                ' min="0"',
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
                10,
                ['min' => 5],
                10,
                ' min="10"',
                "Should return new 'min' after replacing the existing 'min' attribute.",
            ],
            'string' => [
                '08:00',
                [],
                '08:00',
                ' min="08:00"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' min="2024-01-01"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['min' => 10],
                null,
                '',
                "Should unset the 'min' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
