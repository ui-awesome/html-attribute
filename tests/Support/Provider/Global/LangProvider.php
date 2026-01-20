<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Language};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasLangTest} test cases.
 *
 * Provides representative input/output pairs for the `lang` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class LangProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Language::class, GlobalAttribute::LANG);

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
                Language::GERMAN,
                ['lang' => 'it'],
                Language::GERMAN,
                ' lang="de"',
                "Should return new 'lang' after replacing the existing 'lang' attribute.",
            ],
            'string' => [
                'en',
                [],
                'en',
                ' lang="en"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['lang' => 'fr'],
                '',
                '',
                "Should unset the 'lang' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
