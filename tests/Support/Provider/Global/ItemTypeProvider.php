<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasMicroDataTest} test cases.
 *
 * Provides representative input/output pairs for the `itemtype` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ItemTypeProvider
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
                'http://schema.org/Book',
                ['itemtype' => 'http://schema.org/Movie'],
                'http://schema.org/Book',
                ' itemtype="http://schema.org/Book"',
                "Should return new 'itemtype' after replacing the existing 'itemtype' attribute.",
            ],
            'string' => [
                'http://schema.org/Book',
                [],
                'http://schema.org/Book',
                ' itemtype="http://schema.org/Book"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['itemtype' => 'http://schema.org/Book'],
                '',
                '',
                "Should unset the 'itemtype' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
