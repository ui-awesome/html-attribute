<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasMinTest} test cases.
 *
 * Provides representative input/output pairs for the `min` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MinProvider
{
    /**
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string|null, string, string}>
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
                '',
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
            'unset with null' => [
                null,
                ['min' => 10],
                '',
                '',
                "Should unset the 'min' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
