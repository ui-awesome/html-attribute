<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Element;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasWidthTest} test cases.
 *
 * Provides representative input/output pairs for the `width` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class WidthProvider
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
            'enum backed string' => [
                BackedString::VALUE,
                [],
                BackedString::VALUE,
                ' width="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' width="value"',
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
                '100px',
                ['width' => '200px'],
                '100px',
                ' width="100px"',
                "Should return new 'width' after replacing the existing 'width' attribute.",
            ],
            'string' => [
                '100px',
                [],
                '100px',
                ' width="100px"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' width="100px"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['width' => '100px'],
                null,
                '',
                "Should unset the 'width' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
