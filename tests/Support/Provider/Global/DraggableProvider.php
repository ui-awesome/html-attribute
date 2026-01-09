<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

use UIAwesome\Html\Attribute\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Attribute\Values\{Draggable, GlobalAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasDraggableTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the global HTML `draggable` attribute in tag
 * rendering, ensuring standards-compliant assignment, override behavior, and value propagation according to the HTML
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and removing the `draggable` attribute, supporting
 * explicit bool, string, UnitEnum, and attribute replacement, to maintain consistent output across different rendering
 * configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, assignment, override, and removal of the `draggable` attribute in HTML element
 *   rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of bool, string, UnitEnum, and `null` for the `draggable` attribute, including replacement and unset
 *   scenarios.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DraggableProvider
{
    /**
     * Provides test cases for HTML `draggable` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the global HTML `draggable` attribute,
     * including bool, string, UnitEnum, and replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `draggable` attribute scenarios.
     *
     * @phpstan-return array<string, array{bool|string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(Draggable::class, GlobalAttribute::DRAGGABLE->value);

        $staticCase = [
            'boolean false' => [
                false,
                [],
                'false',
                ' draggable="false"',
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                true,
                [],
                'true',
                ' draggable="true"',
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
                'true',
                ['draggable' => 'false'],
                'true',
                ' draggable="true"',
                "Should return new 'draggable' after replacing the existing 'draggable' attribute.",
            ],
            'string boolean false' => [
                'false',
                [],
                'false',
                ' draggable="false"',
                'Should return the attribute value after setting it.',
            ],
            'string boolean true' => [
                'true',
                [],
                'true',
                ' draggable="true"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['draggable' => 'true'],
                '',
                '',
                "Should unset the 'draggable' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
