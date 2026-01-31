<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, MetaName};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasNameTest} test cases.
 *
 * Provides representative input/output pairs for the `name` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class NameProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(MetaName::class, Attribute::NAME);

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
                'description',
                ['name' => 'viewport'],
                'description',
                ' name="description"',
                "Should return new 'name' after replacing the existing 'name' attribute.",
            ],
            'string viewport' => [
                'viewport',
                [],
                'viewport',
                ' name="viewport"',
                'Should return the attribute value after setting it to viewport.',
            ],
            'string description' => [
                'description',
                [],
                'description',
                ' name="description"',
                'Should return the attribute value after setting it to description.',
            ],
            'string keywords' => [
                'keywords',
                [],
                'keywords',
                ' name="keywords"',
                'Should return the attribute value after setting it to keywords.',
            ],
            'string author' => [
                'author',
                [],
                'author',
                ' name="author"',
                'Should return the attribute value after setting it to author.',
            ],
            'string robots' => [
                'robots',
                [],
                'robots',
                ' name="robots"',
                'Should return the attribute value after setting it to robots.',
            ],
            'unset with null' => [
                null,
                ['name' => 'viewport'],
                '',
                '',
                "Should unset the 'name' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
