<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Element;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasWidthTest} test cases.
 *
 * Provides representative input/output pairs for the `width` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class WidthProvider
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
                ['width' => '200px'],
                '100px',
                ' width="100px"',
                "Should return new 'width' after replacing the existing 'width' attribute.",
            ],
            'string' => [
                '100px',
                [],
                '100px',
                ' width="100px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['width' => '100px'],
                '',
                '',
                "Should unset the 'width' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
