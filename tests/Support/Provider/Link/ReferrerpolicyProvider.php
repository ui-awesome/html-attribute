<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Link;

use UIAwesome\Html\Attribute\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Attribute\Values\Referrerpolicy;
use UnitEnum;

final class ReferrerpolicyProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string}>
     */
    public static function renderAttribute(): array
    {
        $enumCases = EnumDataGenerator::cases(Referrerpolicy::class, 'referrerpolicy', true);

        $staticCase = [
            'empty string' => [
                '',
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'enum replace existing' => [
                Referrerpolicy::NO_REFERRER,
                ['referrerpolicy' => 'origin'],
                ' referrerpolicy="no-referrer"',
                "Should return new 'referrerpolicy' after replacing the existing 'referrerpolicy' attribute with " .
                'enum value.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'no-referrer',
                ['referrerpolicy' => 'origin'],
                ' referrerpolicy="no-referrer"',
                "Should return new 'referrerpolicy' after replacing the existing 'referrerpolicy' attribute.",
            ],
            'string' => [
                'no-referrer',
                [],
                ' referrerpolicy="no-referrer"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['referrerpolicy' => 'no-referrer'],
                '',
                "Should unset the 'referrerpolicy' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }

    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(Referrerpolicy::class, 'referrerpolicy', false);

        $staticCase = [
            'empty string' => [
                '',
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'no-referrer',
                ['referrerpolicy' => 'origin'],
                'no-referrer',
                "Should return new 'referrerpolicy' after replacing the existing 'referrerpolicy' attribute.",
            ],
            'string' => [
                'no-referrer',
                [],
                'no-referrer',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['referrerpolicy' => 'no-referrer'],
                '',
                "Should unset the 'referrerpolicy' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
