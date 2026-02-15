<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Form;

use PHPForge\Support\Stub\{BackedInteger, BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Form\HasStepTest} test cases.
 *
 * Provides representative input/output pairs for the `step` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StepProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{float|int|string|Stringable|UnitEnum|null, mixed[], float|int|string|Stringable|UnitEnum|null, string, string},
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'any';
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
            'enum backed integer' => [
                BackedInteger::VALUE,
                [],
                BackedInteger::VALUE,
                ' step="1"',
                'Should return the attribute value after setting it.',
            ],
            'enum backed string' => [
                BackedString::VALUE,
                [],
                BackedString::VALUE,
                ' step="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' step="value"',
                'Should return the attribute value after setting it.',
            ],
            'float' => [
                0.5,
                [],
                0.5,
                ' step="0.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                1,
                [],
                1,
                ' step="1"',
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
                1,
                ['step' => 0.5],
                1,
                ' step="1"',
                "Should return new 'step' after replacing the existing 'step' attribute.",
            ],
            'string' => [
                'any',
                [],
                'any',
                ' step="any"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' step="any"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['step' => 1],
                null,
                '',
                "Should unset the 'step' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
