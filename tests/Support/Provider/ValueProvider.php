<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasValueTest} test cases.
 *
 * Provides representative input/output pairs for the `value` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ValueProvider
{
    /**
     * @phpstan-return array<string, array{float|int|string|UnitEnum|null, mixed[], float|int|string, string, string}>
     */
    public static function values(): array
    {
        return [
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return empty when setting an empty string.',
            ],
            'float' => [
                3.14,
                [],
                3.14,
                ' value="3.14"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                3,
                [],
                3,
                ' value="3"',
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
                5,
                ['value' => 2],
                5,
                ' value="5"',
                "Should return new 'value' after replacing the existing 'value' attribute.",
            ],
            'string' => [
                'text-value',
                [],
                'text-value',
                ' value="text-value"',
                'Should return the attribute value after setting it.',
            ],
            'string with spaces' => [
                'text with spaces',
                [],
                'text with spaces',
                ' value="text with spaces"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['value' => 10],
                '',
                '',
                "Should unset the 'value' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
