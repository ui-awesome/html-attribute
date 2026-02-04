<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Form;

use PHPForge\Support\Stub\{BackedInteger, BackedString};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Form\HasMinlengthTest} test cases.
 *
 * Provides representative input/output pairs for the `minlength` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MinlengthProvider
{
    /**
     * @phpstan-return array<string, array{int|string|Stringable|UnitEnum}>
     */
    public static function invalidValues(): array
    {
        return [
            'enum backed string' => [
                BackedString::VALUE,
            ],
            'integer negative less than -1' => [
                -1,
            ],
            'string float' => [
                '5.5',
            ],
            'string negative less than -1' => [
                '-1',
            ],
            'string non-numeric' => [
                'invalid',
            ],
            'stringable negative less than -1' => [
                new class implements Stringable {
                    public function __toString(): string
                    {
                        return '-10';
                    }
                },
            ],
        ];
    }

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
                return '150';
            }
        };

        return [
            'enum backed integer' => [
                BackedInteger::VALUE,
                [],
                1,
                ' minlength="1"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                50,
                [],
                50,
                ' minlength="50"',
                'Should return the attribute value after setting it.',
            ],
            'integer zero' => [
                0,
                [],
                0,
                ' minlength="0"',
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
                10,
                ['minlength' => 5],
                10,
                ' minlength="10"',
                "Should return new 'minlength' after replacing the existing 'minlength' attribute.",
            ],
            'string' => [
                '150',
                [],
                '150',
                ' minlength="150"',
                'Should return the attribute value after setting it.',
            ],
            'string zero' => [
                '0',
                [],
                '0',
                ' minlength="0"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' minlength="150"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['minlength' => 8],
                '',
                '',
                "Should unset the 'minlength' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
