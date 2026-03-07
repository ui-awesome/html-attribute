<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\CanBeSelectedTest} test cases.
 *
 * Provides representative input/output pairs for the `selected` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class SelectedProvider
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
                ' selected',
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
                ['selected' => false],
                true,
                ' selected',
                "Should return new 'selected' after replacing the existing 'selected' attribute.",
            ],
            'unset with null' => [
                null,
                ['selected' => true],
                null,
                '',
                "Should unset the 'selected' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
