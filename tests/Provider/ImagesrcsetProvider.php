<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasImagesrcsetTest} test cases.
 *
 * Provides representative input/output pairs for the `imagesrcset` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ImagesrcsetProvider
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
                return 'image-400.jpg 400w';
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
                ' imagesrcset="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' imagesrcset="value"',
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
                'image-200.jpg 200w',
                ['imagesrcset' => 'image-400.jpg 400w'],
                'image-200.jpg 200w',
                ' imagesrcset="image-200.jpg 200w"',
                "Should return new 'imagesrcset' after replacing the existing 'imagesrcset' attribute.",
            ],
            'string' => [
                'image-400.jpg 400w',
                [],
                'image-400.jpg 400w',
                ' imagesrcset="image-400.jpg 400w"',
                'Should return the attribute value after setting it.',
            ],
            'string with multiple' => [
                'image-400.jpg 400w, image-800.jpg 800w, image-1200.jpg 1200w',
                [],
                'image-400.jpg 400w, image-800.jpg 800w, image-1200.jpg 1200w',
                ' imagesrcset="image-400.jpg 400w, image-800.jpg 800w, image-1200.jpg 1200w"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' imagesrcset="image-400.jpg 400w"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['imagesrcset' => 'image-400.jpg 400w'],
                '',
                '',
                "Should unset the 'imagesrcset' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
