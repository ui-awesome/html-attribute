<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Link;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Link\HasHrefTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the HTML and SVG `href` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the HTML and SVG
 * specifications.
 *
 * The test data covers real-world scenarios for setting, overriding, and removing the `href` attribute, supporting
 * string and `null`, to maintain consistent output across different rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, assignment, override, and removal of the `href` attribute in HTML/SVG element
 *   rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of string and `null` for the `href` attribute, including replacement and unset scenarios.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class HrefProvider
{
    /**
     * Provides test cases for rendered HTML/SVG `href` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the `href` attribute, including string and
     * `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for rendered `href` attribute scenarios.
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
                'https://example.com/new',
                ['href' => 'https://example.com/old'],
                ' href="https://example.com/new"',
                "Should return new 'href' after replacing the existing 'href' attribute.",
            ],
            'string' => [
                'https://example.com/page',
                [],
                ' href="https://example.com/page"',
                'Should return the attribute value after setting it.',
            ],
            'string fragment identifier' => [
                '#section',
                [],
                ' href="#section"',
                'Should return the attribute value after setting it.',
            ],
            'string relative path' => [
                '/about',
                [],
                ' href="/about"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['href' => 'https://example.com/old'],
                '',
                "Should unset the 'href' attribute when 'null' is provided after a value.",
            ],
        ];
    }

    /**
     * Provides test cases for HTML/SVG `href` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the `href` attribute, including string and
     * `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `href` attribute scenarios.
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
                'https://example.com/new',
                ['href' => 'https://example.com/old'],
                'https://example.com/new',
                "Should return new 'href' after replacing the existing 'href' attribute.",
            ],
            'string' => [
                'https://example.com/page',
                [],
                'https://example.com/page',
                'Should return the attribute value after setting it.',
            ],
            'string fragment identifier' => [
                '#section',
                [],
                '#section',
                'Should return a fragment identifier as the href attribute value.',
            ],
            'string relative path' => [
                '/about',
                [],
                '/about',
                'Should return a relative path as the href attribute value.',
            ],
            'unset with null' => [
                null,
                ['href' => 'https://example.com/old'],
                '',
                "Should unset the 'href' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
