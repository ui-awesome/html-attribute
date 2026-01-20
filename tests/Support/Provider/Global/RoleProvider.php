<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Role};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasRoleTest} test cases.
 *
 * Provides representative input/output pairs for the `role` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RoleProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Role::class, GlobalAttribute::ROLE);

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
