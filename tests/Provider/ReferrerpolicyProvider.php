<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\EnumDataProvider;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Attribute, Referrerpolicy};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasReferrerpolicyTest} test cases.
 *
 * Provides representative input/output pairs for the `referrerpolicy` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ReferrerpolicyProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum, string, string}
     * >
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Referrerpolicy::class, Attribute::REFERRERPOLICY);

        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'strict-origin-when-cross-origin';
            }
        };

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
                'no-referrer',
                ['referrerpolicy' => 'origin'],
                'no-referrer',
                ' referrerpolicy="no-referrer"',
                "Should return new 'referrerpolicy' after replacing the existing 'referrerpolicy' attribute.",
            ],
            'string' => [
                'strict-origin-when-cross-origin',
                [],
                'strict-origin-when-cross-origin',
                ' referrerpolicy="strict-origin-when-cross-origin"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' referrerpolicy="strict-origin-when-cross-origin"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['referrerpolicy' => 'no-referrer'],
                '',
                '',
                "Should unset the 'referrerpolicy' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
