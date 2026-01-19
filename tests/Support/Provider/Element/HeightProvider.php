<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Element;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasHeightTest} test cases.
 *
 * Provides representative input/output pairs for the `height` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class HeightProvider
{
    /**
     * @phpstan-return array<string, array{string|null, mixed[], string, string, string}>
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
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '100px',
                ['height' => '200px'],
                '100px',
                ' height="100px"',
                "Should return new 'height' after replacing the existing 'height' attribute.",
            ],
            'string' => [
                '100px',
                [],
                '100px',
                ' height="100px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['height' => '100px'],
                '',
                '',
                "Should unset the 'height' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
