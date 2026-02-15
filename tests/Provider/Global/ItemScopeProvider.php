<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasMicroDataTest} test cases.
 *
 * Provides representative input/output pairs for the `itemscope` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ItemScopeProvider
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
                "Should return 'false' when setting boolean 'false'.",
            ],
            'boolean true' => [
                true,
                [],
                true,
                ' itemscope',
                "Should return 'true' when setting boolean 'true'.",
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
                ['itemscope' => false],
                true,
                ' itemscope',
                "Should return 'true' after replacing the existing 'itemscope' attribute.",
            ],
            'unset with null' => [
                null,
                ['itemscope' => true],
                null,
                '',
                "Should unset the 'itemscope' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
