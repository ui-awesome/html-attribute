<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Form;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Form\CanBeCheckedTest} test cases.
 *
 * Provides representative input/output pairs for the `checked` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class CheckedProvider
{
    /**
     * @phpstan-return array<string, array{bool|null, mixed[], bool|null, string, string}>
     */
    public static function values(): array
    {
        return [
            'boolean false' => [
                false,
                [],
                false,
                '',
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                true,
                [],
                true,
                ' checked',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                true,
                ['checked' => false],
                true,
                ' checked',
                "Should return new 'checked' after replacing the existing 'checked' attribute.",
            ],
            'unset with null' => [
                null,
                ['checked' => true],
                null,
                '',
                "Should unset the 'checked' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
