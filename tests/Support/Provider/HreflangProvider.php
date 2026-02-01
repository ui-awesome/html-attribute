<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasHreflangTest} test cases.
 *
 * Provides representative input/output pairs for the `hreflang` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class HreflangProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        return [
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
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'es',
                ['hreflang' => 'en'],
                'es',
                ' hreflang="es"',
                "Should return new 'hreflang' after replacing the existing 'hreflang' attribute.",
            ],
            'string' => [
                'en',
                [],
                'en',
                ' hreflang="en"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['hreflang' => 'en'],
                '',
                '',
                "Should unset the 'hreflang' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
