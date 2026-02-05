<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\EnumDataProvider;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Attribute, HttpEquiv};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasHttpEquivTest} test cases.
 *
 * Provides representative input/output pairs for the `http-equiv` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class HttpEquivProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum, string, string}
     * >
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(HttpEquiv::class, Attribute::HTTP_EQUIV);

        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'content-type';
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
                'refresh',
                ['http-equiv' => 'content-type'],
                'refresh',
                ' http-equiv="refresh"',
                "Should return new 'http-equiv' after replacing the existing 'http-equiv' attribute.",
            ],
            'string' => [
                'content-type',
                [],
                'content-type',
                ' http-equiv="content-type"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' http-equiv="content-type"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['http-equiv' => 'refresh'],
                '',
                '',
                "Should unset the 'http-equiv' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
