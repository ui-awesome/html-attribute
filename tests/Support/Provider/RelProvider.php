<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use UIAwesome\Html\Attribute\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Attribute\Values\Rel;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasRelTest} test cases.
 *
 * Provides representative input/output pairs for the `rel` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RelProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(Rel::class, Attribute::REL);

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
                'noopener',
                ['rel' => 'alternate'],
                'noopener',
                ' rel="noopener"',
                "Should return new 'rel' after replacing the existing 'rel' attribute.",
            ],
            'string' => [
                'noopener',
                [],
                'noopener',
                ' rel="noopener"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['rel' => 'noopener'],
                '',
                '',
                "Should unset the 'rel' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
