<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\CanBeHiddenTest} test cases.
 *
 * Provides representative input/output pairs for the `hidden` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class HiddenProvider
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
                ' hidden',
                'Should return the attribute value after setting it.',
            ],
            'replace existing false' => [
                false,
                ['hidden' => true],
                false,
                '',
                "Should return 'false' when replacing existing 'hidden' attribute with 'false'.",
            ],
            'replace existing true' => [
                true,
                ['hidden' => false],
                true,
                ' hidden',
                "Should return 'true' when replacing existing 'hidden' attribute with 'true'.",
            ],
        ];
    }
}
