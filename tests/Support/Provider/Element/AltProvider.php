<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Element;

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
            'unset with null' => [
                null,
                ['alt' => 'A descriptive alt text.'],
                '',
                '',
                "Should unset the 'alt' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
