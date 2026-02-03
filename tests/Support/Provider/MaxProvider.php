<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasMaxTest} test cases.
 *
 * Provides representative input/output pairs for the `max` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MaxProvider
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
                3.14,
                [],
                3.14,
                ' max="3.14"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                10,
                [],
                10,
                ' max="10"',
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
                ['max' => 5],
                10,
                ' max="10"',
                "Should return new 'max' after replacing the existing 'max' attribute.",
            ],
            'string' => [
                '2024-01-01',
                [],
                '2024-01-01',
                ' max="2024-01-01"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['max' => 10],
                '',
                '',
                "Should unset the 'max' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
