<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Link;

use UIAwesome\Html\Attribute\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Attribute\Values\Rel;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Link\HasRelTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the HTML `rel` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to the HTML specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and removing the `rel` attribute, supporting
 * string, UnitEnum, and `null`, to maintain consistent output across different rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, assignment, override, and removal of the `rel` attribute in HTML element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of string, UnitEnum, and `null` for the `rel` attribute, including replacement and unset scenarios.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RelProvider
{
    /**
     * Provides test cases for rendered HTML `rel` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the HTML `rel` attribute,
     * including string, UnitEnum, and `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for rendered `rel` attribute scenarios.
     *
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
     * Provides test cases for HTML `rel` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the HTML `rel` attribute, including
     * string, UnitEnum, and `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `rel` attribute scenarios.
     *
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
