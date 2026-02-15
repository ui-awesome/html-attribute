<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Form;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Form\HasPlaceholderTest} test cases.
 *
 * Provides representative input/output pairs for the `placeholder` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PlaceholderProvider
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
                return 'Hint message';
            }
        };

        return [
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return empty when setting an empty string.',
            ],
            'enum backed string' => [
                BackedString::VALUE,
                [],
                BackedString::VALUE,
                ' placeholder="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' placeholder="value"',
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
                'Enter text',
                ['placeholder' => 'Hint message'],
                'Enter text',
                ' placeholder="Enter text"',
                "Should return new 'placeholder' after replacing the existing 'placeholder' attribute.",
            ],
            'string' => [
                'Enter text',
                [],
                'Enter text',
                ' placeholder="Enter text"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' placeholder="Hint message"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['placeholder' => 'Enter text'],
                null,
                '',
                "Should unset the 'placeholder' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
