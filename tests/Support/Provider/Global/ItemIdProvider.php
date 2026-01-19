<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasMicroDataTest} test cases.
 *
 * Provides representative input/output pairs for the `itemid` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ItemIdProvider
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
                'new-id',
                ['itemid' => 'old-id'],
                'new-id',
                ' itemid="new-id"',
                "Should return new 'itemid' after replacing the existing 'itemid' attribute.",
            ],
            'string' => [
                'id-one',
                [],
                'id-one',
                ' itemid="id-one"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['itemid' => 'id-two'],
                '',
                '',
                "Should unset the 'itemid' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
