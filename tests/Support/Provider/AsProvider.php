<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{AsValue, Attribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasAsTest} test cases.
 *
 * Provides representative input/output pairs for the `as` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class AsProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(AsValue::class, Attribute::AS);

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
                'font',
                ['as' => 'image'],
                'font',
                ' as="font"',
                "Should return new 'as' after replacing the existing 'as' attribute.",
            ],
            'string' => [
                'script',
                [],
                'script',
                ' as="script"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['as' => 'style'],
                '',
                '',
                "Should unset the 'as' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
