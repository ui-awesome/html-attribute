<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{Autocapitalize, GlobalAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasAutocapitalizeTest} test cases.
 */
final class AutocapitalizeProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum|null, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Autocapitalize::class, GlobalAttribute::AUTOCAPITALIZE);

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
                'words',
                ['autocapitalize' => 'sentences'],
                'words',
                ' autocapitalize="words"',
                "Should return new 'autocapitalize' after replacing the existing 'autocapitalize' attribute.",
            ],
            'string' => [
                'sentences',
                [],
                'sentences',
                ' autocapitalize="sentences"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['autocapitalize' => 'sentences'],
                null,
                '',
                "Should unset the 'autocapitalize' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$enumCases, ...$staticCases];
    }
}
