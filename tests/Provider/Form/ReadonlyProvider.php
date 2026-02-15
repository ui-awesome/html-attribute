<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Form;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Form\HasReadonlyTest} test cases.
 *
 * Provides representative input/output pairs for the `readonly` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ReadonlyProvider
{
    /**
     * @phpstan-return array<string, array{bool|null, mixed[], bool|string|null, string, string}>
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
                ' readonly',
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
                ['readonly' => false],
                true,
                ' readonly',
                "Should return new 'readonly' after replacing the existing 'readonly' attribute.",
            ],
            'unset with null' => [
                null,
                ['readonly' => true],
                null,
                '',
                "Should unset the 'readonly' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
