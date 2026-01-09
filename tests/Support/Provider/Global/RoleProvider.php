<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

use UIAwesome\Html\Attribute\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Role};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasRoleTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the global HTML `role` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the HTML
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and removing the `role` attribute, supporting
 * explicit string, UnitEnum for enum-based, and `null` for attribute removal, to maintain consistent output across
 * different rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, assignment, override, and removal of the `role` attribute in HTML element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of string (including empty strings), UnitEnum, and `null` for the `role` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RoleProvider
{
    /**
     * Provides test cases for HTML `role` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the global HTML `role` attribute,
     * including string, UnitEnum, and replacement scenarios.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `role` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(Role::class, GlobalAttribute::ROLE);

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
                'button',
                ['role' => 'alert'],
                'button',
                ' role="button"',
                "Should return new 'role' after replacing the existing 'role' attribute.",
            ],
            'string' => [
                'alert',
                [],
                'alert',
                ' role="alert"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['role' => 'alert'],
                '',
                '',
                "Should unset the 'role' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
