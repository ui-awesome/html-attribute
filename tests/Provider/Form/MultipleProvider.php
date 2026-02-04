<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Form;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Form\HasMultipleTest} test cases.
 *
 * Provides representative input/output pairs for the `multiple` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MultipleProvider
{
    /**
     * @phpstan-return array<string, array{bool|null, mixed[], bool|string, string, string}>
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
                ' multiple',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                true,
                ['multiple' => false],
                true,
                ' multiple',
                "Should return new 'multiple' after replacing the existing 'multiple' attribute.",
            ],
            'unset with null' => [
                null,
                ['multiple' => true],
                '',
                '',
                "Should unset the 'multiple' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
