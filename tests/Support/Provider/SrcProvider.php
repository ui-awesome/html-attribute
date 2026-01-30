<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasSrcTest} test cases.
 *
 * Provides representative input/output pairs for the `src` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class SrcProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
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
                'https://example.com/new.js',
                ['src' => 'https://example.com/old.js'],
                'https://example.com/new.js',
                ' src="https://example.com/new.js"',
                "Should return new 'src' after replacing the existing 'src' attribute.",
            ],
            'string' => [
                'https://example.com/script.js',
                [],
                'https://example.com/script.js',
                ' src="https://example.com/script.js"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['src' => 'https://example.com/script.js'],
                '',
                '',
                "Should unset the 'src' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
