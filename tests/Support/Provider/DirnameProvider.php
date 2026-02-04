<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasDirnameTest} test cases.
 *
 * Provides representative input/output pairs for the `dirname` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DirnameProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum, string, string},
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'comment-dir';
            }
        };

        return [
            'enum backed string' => [
                BackedString::VALUE,
                [],
                BackedString::VALUE,
                ' dirname="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' dirname="value"',
                'Should return the attribute value after setting it.',
            ],
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
                'comment-dir',
                ['dirname' => 'text-direction'],
                'comment-dir',
                ' dirname="comment-dir"',
                "Should return new 'dirname' after replacing the existing 'dirname' attribute.",
            ],
            'string' => [
                'text-direction',
                [],
                'text-direction',
                ' dirname="text-direction"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' dirname="comment-dir"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['dirname' => 'comment-dir'],
                '',
                '',
                "Should unset the 'dirname' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
