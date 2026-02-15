<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasTabIndexTest} test cases.
 *
 * Provides representative input/output pairs for the `tabindex` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class TabIndexProvider
{
    /**
     * @phpstan-return array<string, array{int|string}>
     */
    public static function invalidValues(): array
    {
        return [
            'integer negative less than -1' => [
                -2,
            ],
            'string float' => [
                '5.5',
            ],
            'string negative less than -1' => [
                '-2',
            ],
            'string non-numeric' => [
                'invalid',
            ],
        ];
    }

    /**
     * @phpstan-return array<string, array{int|string|null, mixed[], int|string|null, string, string}>
     */
    public static function values(): array
    {
        return [
            'integer' => [
                1,
                [],
                1,
                ' tabindex="1"',
                'Should return the attribute value after setting it.',
            ],
            'integer negative' => [
                -1,
                [],
                -1,
                ' tabindex="-1"',
                'Should return the attribute value after setting it.',
            ],
            'integer zero' => [
                0,
                [],
                0,
                ' tabindex="0"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                null,
                '',
                "Should return an empty 'array' when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                2,
                ['tabindex' => 1],
                2,
                ' tabindex="2"',
                "Should return new 'tabindex' after replacing the existing 'tabindex' attribute.",
            ],
            'string negative' => [
                '-1',
                [],
                '-1',
                ' tabindex="-1"',
                'Should return the attribute value after setting it.',
            ],
            'string numeric' => [
                '3',
                [],
                '3',
                ' tabindex="3"',
                'Should return the attribute value after setting it.',
            ],
            'string zero' => [
                '0',
                [],
                '0',
                ' tabindex="0"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['tabindex' => 1],
                null,
                '',
                "Should unset the 'tabindex' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
