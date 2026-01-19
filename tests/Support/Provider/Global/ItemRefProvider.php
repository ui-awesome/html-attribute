<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasMicroDataTest} test cases.
 *
 * Provides representative input/output pairs for the `itemref` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ItemRefProvider
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
                'a b',
                ['itemref' => 'c'],
                'a b',
                ' itemref="a b"',
                "Should return new 'itemref' after replacing the existing 'itemref' attribute.",
            ],
            'string' => [
                'a b',
                [],
                'a b',
                ' itemref="a b"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['itemref' => 'a b'],
                '',
                '',
                "Should unset the 'itemref' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
