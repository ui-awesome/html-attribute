<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasDisabledTest} test cases.
 *
 * Provides representative input/output pairs for the `disabled` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DisabledProvider
{
    /**
     * @phpstan-return array<string, array{bool|null, mixed[], bool|null, string, string}>
     */
    public static function values(): array
    {
        return [
            'null' => [
                null,
                [],
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'true' => [
                true,
                [],
                true,
                ' disabled',
                'Should return the attribute value after setting it to true.',
            ],
            'false' => [
                false,
                [],
                false,
                '',
                'Should return empty string when setting false (boolean attribute).',
            ],
            'replace existing' => [
                true,
                ['disabled' => false],
                true,
                ' disabled',
                "Should return new 'disabled' after replacing the existing 'disabled' attribute.",
            ],
            'unset with null' => [
                null,
                ['disabled' => true],
                null,
                '',
                "Should unset the 'disabled' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
