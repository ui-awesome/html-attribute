<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasMicroDataTest} test cases.
 *
 * Provides representative input/output pairs for the `itemprop` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ItemPropProvider
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
                'name',
                ['itemprop' => 'director'],
                'name',
                ' itemprop="name"',
                "Should return new 'itemprop' after replacing the existing 'itemprop' attribute.",
            ],
            'string' => [
                'name',
                [],
                'name',
                ' itemprop="name"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['itemprop' => 'name'],
                '',
                '',
                "Should unset the 'itemprop' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
