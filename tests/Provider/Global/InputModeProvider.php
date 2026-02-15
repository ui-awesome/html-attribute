<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, InputMode};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasInputModeTest} test cases.
 *
 * Provides representative input/output pairs for the `inputmode` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class InputModeProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum|null, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(InputMode::class, GlobalAttribute::INPUTMODE);

        $staticCases = [
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
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'decimal',
                ['inputmode' => 'numeric'],
                'decimal',
                ' inputmode="decimal"',
                "Should return new 'inputmode' after replacing the existing 'inputmode' attribute.",
            ],
            'string' => [
                'text',
                [],
                'text',
                ' inputmode="text"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['inputmode' => 'text'],
                null,
                '',
                "Should unset the 'inputmode' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$enumCases, ...$staticCases];
    }
}
