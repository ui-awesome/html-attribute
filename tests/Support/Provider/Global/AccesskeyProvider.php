<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasAccesskeyTest} test cases.
 *
 * Provides representative input/output pairs for the `accesskey` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class AccesskeyProvider
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
                'key',
                ['accesskey' => 'old-key'],
                'key',
                ' accesskey="key"',
                "Should return new 'accesskey' after replacing the existing 'accesskey' attribute.",
            ],
            'string' => [
                'key',
                [],
                'key',
                ' accesskey="key"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['accesskey' => 'old-key'],
                '',
                '',
                "Should unset the 'accesskey' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
