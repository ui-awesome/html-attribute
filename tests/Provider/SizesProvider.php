<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasSizesTest} test cases.
 *
 * Provides representative input/output pairs for the `sizes` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class SizesProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum, string, string}
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'any';
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
                ' sizes="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' sizes="value"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '32x32',
                ['sizes' => '16x16'],
                '32x32',
                ' sizes="32x32"',
                "Should return new 'sizes' after replacing the existing 'sizes' attribute.",
            ],
            'string' => [
                'any',
                [],
                'any',
                ' sizes="any"',
                'Should return the attribute value after setting it.',
            ],
            'string with multiple sizes' => [
                '16x16 32x32 48x48',
                [],
                '16x16 32x32 48x48',
                ' sizes="16x16 32x32 48x48"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' sizes="any"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['sizes' => '16x16'],
                '',
                '',
                "Should unset the 'sizes' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
