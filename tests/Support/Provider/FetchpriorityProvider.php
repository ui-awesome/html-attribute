<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use UIAwesome\Html\Attribute\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Attribute\Values\{Attribute, Fetchpriority};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasFetchpriorityTest} test cases.
 *
 * Provides representative input/output pairs for the `fetchpriority` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FetchpriorityProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(Fetchpriority::class, Attribute::FETCHPRIORITY);

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
                'high',
                ['fetchpriority' => 'low'],
                'high',
                ' fetchpriority="high"',
                "Should return new 'fetchpriority' after replacing the existing 'fetchpriority' attribute.",
            ],
            'string' => [
                'high',
                [],
                'high',
                ' fetchpriority="high"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['fetchpriority' => 'high'],
                '',
                '',
                "Should unset the 'fetchpriority' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
