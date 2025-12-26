<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Media;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Media\HasSrcTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the HTML `src` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to the HTML specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and removing the `src` attribute, supporting
 * string and `null`, to maintain consistent output across different rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, assignment, override, and removal of the `src` attribute in HTML element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of string and `null` for the `src` attribute, including replacement and unset scenarios.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class SrcProvider
{
    /**
     * Provides test cases for rendered HTML `src` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the HTML `src` attribute, including string
     * and `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for rendered `src` attribute scenarios.
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
                'http://example.com/image.png',
                ['src' => 'http://example.com/old-image.png'],
                ' src="http://example.com/image.png"',
                "Should return new 'src' after replacing the existing 'src' attribute.",
            ],
            'string' => [
                'http://example.com/image.png',
                [],
                ' src="http://example.com/image.png"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['src' => 'http://example.com/image.png'],
                '',
                "Should unset the 'src' attribute when 'null' is provided after a value.",
            ],
        ];
    }

    /**
     * Provides test cases for HTML `src` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the HTML `src` attribute, including string
     * and `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `src` attribute scenarios.
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
                'http://example.com/image.png',
                ['src' => 'http://example.com/old-image.png'],
                'http://example.com/image.png',
                "Should return new 'src' after replacing the existing 'src' attribute.",
            ],
            'string' => [
                'http://example.com/image.png',
                [],
                'http://example.com/image.png',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['src' => 'http://example.com/image.png'],
                '',
                "Should unset the 'src' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
