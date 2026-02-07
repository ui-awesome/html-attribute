<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Popover};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasPopoverTest} test cases.
 *
 * Provides representative input/output pairs for the `popover` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PopoverProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Popover::class, GlobalAttribute::POPOVER);

        $staticCases = [
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
                'manual',
                ['popover' => 'auto'],
                'manual',
                ' popover="manual"',
                "Should return new 'popover' after replacing the existing 'popover' attribute.",
            ],
            'string auto' => [
                'auto',
                [],
                'auto',
                ' popover="auto"',
                'Should return the attribute value after setting it.',
            ],
            'string manual' => [
                'manual',
                [],
                'manual',
                ' popover="manual"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['popover' => 'auto'],
                '',
                '',
                "Should unset the 'popover' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$enumCases, ...$staticCases];
    }
}
