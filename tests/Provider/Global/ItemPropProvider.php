<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasMicroDataTest} test cases.
 *
 * Provides representative input/output pairs for the `itemprop` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ItemPropProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum|null, string, string},
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'name';
            }
        };

        return [
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'enum backed string' => [
                BackedString::VALUE,
                [],
                BackedString::VALUE,
                ' itemprop="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' itemprop="value"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'name',
                ['itemprop' => 'director'],
                'name',
                ' itemprop="name"',
                "Should return new 'itemprop' after replacing the existing 'itemprop' attribute.",
            ],
            'string' => [
                'name',
                [],
                'name',
                ' itemprop="name"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' itemprop="name"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['itemprop' => 'name'],
                null,
                '',
                "Should unset the 'itemprop' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
