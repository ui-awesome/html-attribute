<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Element;

use UIAwesome\Html\Attribute\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Attribute\Values\{Decoding, ElementAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasDecodingTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the HTML/SVG `decoding` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the HTML
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and removing the `decoding` attribute,
 * supporting string, UnitEnum, and `null`, to maintain consistent output across different rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, assignment, override, and removal of the `decoding` attribute in HTML element
 *   rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of string, UnitEnum, and `null` for the `decoding` attribute, including replacement and unset
 *   scenarios.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DecodingProvider
{
    /**
     * Provides test cases for HTML/SVG `decoding` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the HTML/SVG `decoding` attribute,
     * including string, UnitEnum, and `null`, as well as replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `decoding` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(Decoding::class, ElementAttribute::DECODING);

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
                'async',
                ['decoding' => 'sync'],
                'async',
                ' decoding="async"',
                "Should return new 'decoding' after replacing the existing 'decoding' attribute.",
            ],
            'string' => [
                'async',
                [],
                'async',
                ' decoding="async"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['decoding' => 'async'],
                '',
                '',
                "Should unset the 'decoding' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
