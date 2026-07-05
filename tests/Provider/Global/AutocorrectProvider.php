<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{Autocorrect, GlobalAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasAutocorrectTest} test cases.
 */
final class AutocorrectProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum|null, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Autocorrect::class, GlobalAttribute::AUTOCORRECT);

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
                'on',
                ['autocorrect' => 'off'],
                'on',
                ' autocorrect="on"',
                "Should return new 'autocorrect' after replacing the existing 'autocorrect' attribute.",
            ],
            'string' => [
                'on',
                [],
                'on',
                ' autocorrect="on"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['autocorrect' => 'on'],
                null,
                '',
                "Should unset the 'autocorrect' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$enumCases, ...$staticCases];
    }
}
