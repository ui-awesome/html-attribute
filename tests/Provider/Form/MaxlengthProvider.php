<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Form;

use PHPForge\Support\Stub\{BackedInteger, BackedString};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Form\HasMaxlengthTest} test cases.
 *
 * Provides representative input/output pairs for the `maxlength` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MaxlengthProvider
{
    /**
     * @phpstan-return array<string, array{int|string|Stringable|UnitEnum|null}>
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
     *   array{int|string|Stringable|UnitEnum|null, mixed[], int|string|Stringable|UnitEnum|null, string, string},
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
                ' maxlength="1"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                50,
                [],
                50,
                ' maxlength="50"',
                'Should return the attribute value after setting it.',
            ],
            'integer zero' => [
                0,
                [],
                0,
                ' maxlength="0"',
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
                50,
                ['maxlength' => 100],
                50,
                ' maxlength="50"',
                "Should return new 'maxlength' after replacing the existing 'maxlength' attribute.",
            ],
            'string' => [
                '150',
                [],
                '150',
                ' maxlength="150"',
                'Should return the attribute value after setting it.',
            ],
            'string zero' => [
                '0',
                [],
                '0',
                ' maxlength="0"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' maxlength="150"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['maxlength' => 50],
                null,
                '',
                "Should unset the 'maxlength' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
