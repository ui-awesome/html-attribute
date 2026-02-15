<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasMicroDataTest} test cases.
 *
 * Provides representative input/output pairs for the `itemtype` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ItemTypeProvider
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
                return 'http://schema.org/Book';
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
                ' itemtype="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' itemtype="value"',
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
                'http://schema.org/Book',
                ['itemtype' => 'http://schema.org/Movie'],
                'http://schema.org/Book',
                ' itemtype="http://schema.org/Book"',
                "Should return new 'itemtype' after replacing the existing 'itemtype' attribute.",
            ],
            'string' => [
                'http://schema.org/Book',
                [],
                'http://schema.org/Book',
                ' itemtype="http://schema.org/Book"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' itemtype="http://schema.org/Book"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['itemtype' => 'http://schema.org/Book'],
                null,
                '',
                "Should unset the 'itemtype' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
