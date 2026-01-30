<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\CanBeAutofocusTest} test cases.
 *
 * Provides representative input/output pairs for the `autofocus` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class AutofocusProvider
{
    /**
     * @phpstan-return array<string, array{bool, mixed[], bool|string, string, string}>
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
                ' autofocus',
                'Should return the attribute value after setting it.',
            ],
            'replace existing false' => [
                false,
                ['autofocus' => true],
                false,
                '',
                "Should return 'false' when replacing existing 'autofocus' attribute with 'false'.",
            ],
            'replace existing true' => [
                true,
                ['autofocus' => false],
                true,
                ' autofocus',
                "Should return 'true' when replacing existing 'autofocus' attribute with 'true'.",
            ],
        ];
    }
}
