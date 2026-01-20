<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Element;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, Referrerpolicy};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasReferrerpolicyTest} test cases.
 *
 * Provides representative input/output pairs for the `referrerpolicy` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ReferrerpolicyProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Referrerpolicy::class, ElementAttribute::REFERRERPOLICY);

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
                'no-referrer',
                ['referrerpolicy' => 'origin'],
                'no-referrer',
                ' referrerpolicy="no-referrer"',
                "Should return new 'referrerpolicy' after replacing the existing 'referrerpolicy' attribute.",
            ],
            'replace existing with enum' => [
                Referrerpolicy::NO_REFERRER,
                ['referrerpolicy' => 'origin'],
                Referrerpolicy::NO_REFERRER,
                ' referrerpolicy="no-referrer"',
                "Should return new 'referrerpolicy' after replacing the existing 'referrerpolicy' attribute with "
                . 'enum value.',
            ],
            'string' => [
                'no-referrer',
                [],
                'no-referrer',
                ' referrerpolicy="no-referrer"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['referrerpolicy' => 'no-referrer'],
                '',
                '',
                "Should unset the 'referrerpolicy' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
