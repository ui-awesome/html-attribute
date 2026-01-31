<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, Charset};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasCharsetTest} test cases.
 *
 * Provides representative input/output pairs for the `charset` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class CharsetProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Charset::class, Attribute::CHARSET);

        $staticCase = [
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
                'utf-8',
                ['charset' => 'iso-8859-1'],
                'utf-8',
                ' charset="utf-8"',
                "Should return new 'charset' after replacing the existing 'charset' attribute.",
            ],
            'string' => [
                'utf-8',
                [],
                'utf-8',
                ' charset="utf-8"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['charset' => 'utf-8'],
                '',
                '',
                "Should unset the 'charset' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
