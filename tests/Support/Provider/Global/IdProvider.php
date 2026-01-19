<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasIdTest} test cases.
 *
 * Provides representative input/output pairs for the `id` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class IdProvider
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
                ['id' => 'old-id'],
                'new-id',
                ' id="new-id"',
                "Should return new 'id' after replacing the existing 'id' attribute.",
            ],
            'string' => [
                'id-one',
                [],
                'id-one',
                ' id="id-one"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['id' => 'id-two'],
                '',
                '',
                "Should unset the 'id' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
