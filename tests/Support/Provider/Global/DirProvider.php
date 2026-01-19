<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

use UIAwesome\Html\Attribute\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Attribute\Values\{Direction, GlobalAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasDirTest} test cases.
 *
 * Provides representative input/output pairs for the `dir` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DirProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(Direction::class, GlobalAttribute::DIR->value);

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
                'auto',
                ['dir' => 'ltr'],
                'auto',
                ' dir="auto"',
                "Should return new 'dir' after replacing the existing 'dir' attribute.",
            ],
            'string' => [
                'ltr',
                [],
                'ltr',
                ' dir="ltr"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['dir' => 'ltr'],
                '',
                '',
                "Should unset the 'dir' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
