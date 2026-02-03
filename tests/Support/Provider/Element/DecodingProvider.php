<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Element;

use PHPForge\Support\EnumDataProvider;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Decoding, ElementAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasDecodingTest} test cases.
 *
 * Provides representative input/output pairs for the `decoding` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DecodingProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum, string, string},
     * >
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Decoding::class, ElementAttribute::DECODING);

        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'async';
            }
        };

        $staticCase = [
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
                'async',
                ['decoding' => 'sync'],
                'async',
                ' decoding="async"',
                "Should return new 'decoding' after replacing the existing 'decoding' attribute.",
            ],
            'string' => [
                'async',
                [],
                'async',
                ' decoding="async"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' decoding="async"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['decoding' => 'async'],
                '',
                '',
                "Should unset the 'decoding' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
