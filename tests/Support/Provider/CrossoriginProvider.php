<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use UIAwesome\Html\Attribute\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Attribute\Values\Crossorigin;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasCrossoriginTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the HTML `crossorigin` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the HTML
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and removing the `crossorigin` attribute,
 * supporting string, UnitEnum, and `null`, to maintain consistent output across different rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, assignment, override, and removal of the `crossorigin` attribute in HTML element
 *   rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of string, UnitEnum, and `null` for the `crossorigin` attribute, including replacement and unset
 *   scenarios.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class CrossoriginProvider
{
    /**
     * Provides test cases for rendered HTML `crossorigin` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the HTML `crossorigin` attribute,
     * including string, UnitEnum, and `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for rendered `crossorigin` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string}>
     */
    public static function renderAttribute(): array
    {
        $enumCases = EnumDataGenerator::cases(Crossorigin::class, 'crossorigin', true);

        $staticCase = [
            'empty string' => [
                '',
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'enum replace existing' => [
                Crossorigin::ANONYMOUS,
                ['crossorigin' => 'use-credentials'],
                ' crossorigin="anonymous"',
                "Should return new 'crossorigin' after replacing the existing 'crossorigin' attribute with "
                . 'enum value.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'anonymous',
                ['crossorigin' => 'use-credentials'],
                ' crossorigin="anonymous"',
                "Should return new 'crossorigin' after replacing the existing 'crossorigin' attribute.",
            ],
            'string' => [
                'anonymous',
                [],
                ' crossorigin="anonymous"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['crossorigin' => 'anonymous'],
                '',
                "Should unset the 'crossorigin' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }

    /**
     * Provides test cases for HTML `crossorigin` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the HTML `crossorigin` attribute,
     * including string, UnitEnum, and `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `crossorigin` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(Crossorigin::class, 'crossorigin', false);

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
                'anonymous',
                ['crossorigin' => 'use-credentials'],
                'anonymous',
                "Should return new 'crossorigin' after replacing the existing 'crossorigin' attribute.",
            ],
            'string' => [
                'anonymous',
                [],
                'anonymous',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['crossorigin' => 'anonymous'],
                '',
                "Should unset the 'crossorigin' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
