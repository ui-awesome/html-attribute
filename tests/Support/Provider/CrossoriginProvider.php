<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, Crossorigin};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasCrossoriginTest} test cases.
 *
 * Provides representative input/output pairs for the `crossorigin` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class CrossoriginProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Crossorigin::class, Attribute::CROSSORIGIN);

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
                'anonymous',
                ['crossorigin' => 'use-credentials'],
                'anonymous',
                ' crossorigin="anonymous"',
                "Should return new 'crossorigin' after replacing the existing 'crossorigin' attribute.",
            ],
            'string' => [
                'anonymous',
                [],
                'anonymous',
                ' crossorigin="anonymous"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['crossorigin' => 'anonymous'],
                '',
                '',
                "Should unset the 'crossorigin' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
