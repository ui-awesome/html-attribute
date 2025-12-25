<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Link;

use UIAwesome\Html\Attribute\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Attribute\Values\Rel;
use UnitEnum;

final class RelProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string}>
     */
    public static function renderAttribute(): array
    {
        $enumCases = EnumDataGenerator::cases(Rel::class, 'rel', true);

        $staticCase = [
            'empty string' => [
                '',
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'enum replace existing' => [
                Rel::NOREFERRER,
                ['rel' => 'noopener'],
                ' rel="noreferrer"',
                "Should return new 'rel' after replacing the existing 'rel' attribute with enum value.",
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'noopener',
                ['rel' => 'alternate'],
                ' rel="noopener"',
                "Should return new 'rel' after replacing the existing 'rel' attribute.",
            ],
            'string' => [
                'noopener',
                [],
                ' rel="noopener"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['rel' => 'noopener'],
                '',
                "Should unset the 'rel' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }

    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(Rel::class, 'rel', false);

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
                'noopener',
                ['rel' => 'alternate'],
                'noopener',
                "Should return new 'rel' after replacing the existing 'rel' attribute.",
            ],
            'string' => [
                'noopener',
                [],
                'noopener',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['rel' => 'noopener'],
                '',
                "Should unset the 'dir' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
