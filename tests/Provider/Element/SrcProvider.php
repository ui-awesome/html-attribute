<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Element;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasSrcTest} test cases.
 *
 * Provides representative input/output pairs for the `src` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class SrcProvider
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
                return 'http://example.com/image.png';
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
                ' src="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' src="value"',
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
                'http://example.com/image.png',
                ['src' => 'http://example.com/old-image.png'],
                'http://example.com/image.png',
                ' src="http://example.com/image.png"',
                "Should return new 'src' after replacing the existing 'src' attribute.",
            ],
            'string' => [
                'http://example.com/image.png',
                [],
                'http://example.com/image.png',
                ' src="http://example.com/image.png"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' src="http://example.com/image.png"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['src' => 'http://example.com/image.png'],
                null,
                '',
                "Should unset the 'src' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
