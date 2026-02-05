<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasImagesizesTest} test cases.
 *
 * Provides representative input/output pairs for the `imagesizes` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ImagesizesProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum, string, string}
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return '100vw';
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
                ' imagesizes="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' imagesizes="value"',
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
                '50vw',
                ['imagesizes' => '100vw'],
                '50vw',
                ' imagesizes="50vw"',
                "Should return new 'imagesizes' after replacing the existing 'imagesizes' attribute.",
            ],
            'string' => [
                '100vw',
                [],
                '100vw',
                ' imagesizes="100vw"',
                'Should return the attribute value after setting it.',
            ],
            'string with media query' => [
                '(max-width: 600px) 100vw, 50vw',
                [],
                '(max-width: 600px) 100vw, 50vw',
                ' imagesizes="(max-width: 600px) 100vw, 50vw"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' imagesizes="100vw"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['imagesizes' => '100vw'],
                '',
                '',
                "Should unset the 'imagesizes' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
