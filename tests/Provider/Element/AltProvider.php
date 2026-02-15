<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Element;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasAltTest} test cases.
 *
 * Provides representative input/output pairs for the `alt` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class AltProvider
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
                return 'A descriptive alt text.';
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
                ' alt="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' alt="value"',
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
                'A descriptive alt text.',
                ['alt' => 'A different alt text.'],
                'A descriptive alt text.',
                ' alt="A descriptive alt text."',
                "Should return new 'alt' after replacing the existing 'alt' attribute.",
            ],
            'string' => [
                'A descriptive alt text.',
                [],
                'A descriptive alt text.',
                ' alt="A descriptive alt text."',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' alt="A descriptive alt text."',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['alt' => 'A descriptive alt text.'],
                null,
                '',
                "Should unset the 'alt' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
