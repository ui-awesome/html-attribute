<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Link;

use UIAwesome\Html\Attribute\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Attribute\Values\Referrerpolicy;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Link\HasReferrerpolicyTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the HTML `referrerpolicy` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the HTML
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and removing the `referrerpolicy` attribute,
 * supporting string, UnitEnum, and `null`, to maintain consistent output across different rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, assignment, override, and removal of the `referrerpolicy` attribute in HTML element
 *   rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of string, UnitEnum, and `null` for the `referrerpolicy` attribute, including replacement and unset
 *   scenarios.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ReferrerpolicyProvider
{
    /**
     * Provides test cases for rendered HTML `referrerpolicy` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the HTML `referrerpolicy` attribute,
     * including string, UnitEnum, and `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for rendered `referrerpolicy` attribute scenarios.
     *
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
     * Provides test cases for HTML `referrerpolicy` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the HTML `referrerpolicy` attribute,
     * including string, UnitEnum, and `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `referrerpolicy` attribute scenarios.
     *
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
