<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Form;

use PHPForge\Support\Stub\BackedInteger;
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Form\HasSizeTest} test cases.
 *
 * Provides representative input/output pairs for the `size` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class SizeProvider
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
                return '12';
            }
        };

        return [
            'enum backed integer' => [
                BackedInteger::VALUE,
                [],
                1,
                ' size="1"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                10,
                [],
                10,
                ' size="10"',
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
                20,
                ['size' => 10],
                20,
                ' size="20"',
                "Should return new 'size' after replacing the existing 'size' attribute.",
            ],
            'string' => [
                '15',
                [],
                '15',
                ' size="15"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' size="12"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['size' => 10],
                '',
                '',
                "Should unset the 'size' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
