<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Element;

use Stringable;
use UIAwesome\Html\Attribute\Tests\Support\Stub\Values\{Backed, Unit};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasHeightTest} test cases.
 *
 * Provides representative input/output pairs for the `height` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class HeightProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{int|string|Stringable|UnitEnum|null, mixed[], int|string|Stringable|UnitEnum, string, string},
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return '100px';
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
            'enum backed' => [
                Backed::VALUE,
                [],
                Backed::VALUE,
                ' height="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' height="value"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '100px',
                ['height' => '200px'],
                '100px',
                ' height="100px"',
                "Should return new 'height' after replacing the existing 'height' attribute.",
            ],
            'string' => [
                '100px',
                [],
                '100px',
                ' height="100px"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' height="100px"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['height' => '100px'],
                '',
                '',
                "Should unset the 'height' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
