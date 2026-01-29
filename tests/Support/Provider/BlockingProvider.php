<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, Blocking};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasBlockingTest} test cases.
 *
 * Provides representative input/output pairs for the `blocking` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class BlockingProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Blocking::class, Attribute::BLOCKING);

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
                'render',
                ['blocking' => 'invalid'],
                'render',
                ' blocking="render"',
                "Should return new 'blocking' after replacing the existing 'blocking' attribute.",
            ],
            'string' => [
                'render',
                [],
                'render',
                ' blocking="render"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['blocking' => 'render'],
                '',
                '',
                "Should unset the 'blocking' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
