<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Media;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Media\HasHeightTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the HTML `height` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the HTML
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and removing the `height` attribute, supporting
 * string and `null`, to maintain consistent output across different rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, assignment, override, and removal of the `height` attribute in HTML element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of string and `null` for the `height` attribute, including replacement and unset scenarios.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class HeightProvider
{
    /**
     * Provides test cases for rendered HTML `height` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the HTML `height` attribute, including
     * string and `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for rendered `height` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|null, mixed[], string, string}>
     */
    public static function renderAttribute(): array
    {
        return [
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
                '100px',
                ['height' => '200px'],
                ' height="100px"',
                "Should return new 'height' after replacing the existing 'height' attribute.",
            ],
            'string' => [
                '100px',
                [],
                ' height="100px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['height' => '100px'],
                '',
                "Should unset the 'height' attribute when 'null' is provided after a value.",
            ],
        ];
    }

    /**
     * Provides test cases for HTML `height` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the HTML `height` attribute, including
     * string and `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `height` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|null, mixed[], string, string}>
     */
    public static function values(): array
    {
        return [
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
                '100px',
                ['height' => '200px'],
                '100px',
                "Should return new 'height' after replacing the existing 'height' attribute.",
            ],
            'string' => [
                '100px',
                [],
                '100px',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['height' => '100px'],
                '',
                "Should unset the 'height' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
