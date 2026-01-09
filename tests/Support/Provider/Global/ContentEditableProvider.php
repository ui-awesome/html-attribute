<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

use UIAwesome\Html\Attribute\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Attribute\Values\{ContentEditable, GlobalAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasContentEditableTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the global HTML `contenteditable` attribute in tag
 * rendering, ensuring standards-compliant assignment, override behavior, and value propagation according to the HTML
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and removing the `contenteditable` attribute,
 * supporting bool, string, UnitEnum, and `null` for attribute assignment and replacement, to maintain consistent output
 * across different rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, assignment, override, and removal of the `contenteditable` attribute in HTML element
 *   rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of bool, string, UnitEnum, and `null` for the `contenteditable` attribute, including replacement and
 *   unset scenarios.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ContentEditableProvider
{
    /**
     * Provides test cases for HTML `contenteditable` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the global HTML `contenteditable`
     * attribute, including bool, string, UnitEnum, and replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `contenteditable` attribute scenarios.
     *
     * @phpstan-return array<string, array{bool|string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(ContentEditable::class, GlobalAttribute::CONTENTEDITABLE);

        $staticCase = [
            'boolean false' => [
                false,
                [],
                'false',
                ' contenteditable="false"',
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                true,
                [],
                'true',
                ' contenteditable="true"',
                'Should return the attribute value after setting it.',
            ],
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
                'plaintext-only',
                ['contenteditable' => 'false'],
                'plaintext-only',
                ' contenteditable="plaintext-only"',
                "Should return new 'contenteditable' after replacing the existing 'contenteditable' attribute.",
            ],
            'string boolean false' => [
                'false',
                [],
                'false',
                ' contenteditable="false"',
                'Should return the attribute value after setting it.',
            ],
            'string boolean true' => [
                'true',
                [],
                'true',
                ' contenteditable="true"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['contenteditable' => 'true'],
                '',
                '',
                "Should unset the 'contenteditable' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
