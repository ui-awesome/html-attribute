<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Translate};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasTranslateTest} test cases.
 *
 * Provides representative input/output pairs for the `translate` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class TranslateProvider
{
    /**
     * @phpstan-return array<string, array{bool|string|UnitEnum|null, mixed[], string|UnitEnum|null, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Translate::class, GlobalAttribute::TRANSLATE);

        $staticCase = [
            'boolean false' => [
                false,
                [],
                'no',
                ' translate="no"',
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                true,
                [],
                'yes',
                ' translate="yes"',
                'Should return the attribute value after setting it.',
            ],
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
                'true',
                ['translate' => 'no'],
                'yes',
                ' translate="yes"',
                "Should return new 'translate' after replacing the existing 'translate' attribute.",
            ],
            'string boolean false' => [
                'false',
                [],
                'no',
                ' translate="no"',
                'Should return the attribute value after setting it.',
            ],
            'string boolean true' => [
                'true',
                [],
                'yes',
                ' translate="yes"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['translate' => 'yes'],
                null,
                '',
                "Should unset the 'translate' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
