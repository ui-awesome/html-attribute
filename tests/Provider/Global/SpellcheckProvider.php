<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasSpellcheckTest} test cases.
 *
 * Provides representative input/output pairs for the `spellcheck` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class SpellcheckProvider
{
    /**
     * @phpstan-return array<string, array{bool|string|null, mixed[], string|null, string, string}>
     */
    public static function values(): array
    {
        return [
            'boolean false' => [
                false,
                [],
                'false',
                ' spellcheck="false"',
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                true,
                [],
                'true',
                ' spellcheck="true"',
                'Should return the attribute value after setting it.',
            ],
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
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'true',
                ['spellcheck' => 'false'],
                'true',
                ' spellcheck="true"',
                "Should return new 'spellcheck' after replacing the existing 'spellcheck' attribute.",
            ],
            'string boolean false' => [
                'false',
                [],
                'false',
                ' spellcheck="false"',
                'Should return the attribute value after setting it.',
            ],
            'string boolean true' => [
                'true',
                [],
                'true',
                ' spellcheck="true"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['spellcheck' => 'true'],
                null,
                '',
                "Should unset the 'spellcheck' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
