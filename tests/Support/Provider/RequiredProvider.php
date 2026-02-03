<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasRequiredTest} test cases.
 *
 * Provides representative input/output pairs for the `required` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RequiredProvider
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
                ' required',
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
                ['required' => false],
                true,
                ' required',
                "Should return new 'required' after replacing the existing 'required' attribute.",
            ],
            'unset with null' => [
                null,
                ['required' => true],
                null,
                '',
                "Should unset the 'required' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
