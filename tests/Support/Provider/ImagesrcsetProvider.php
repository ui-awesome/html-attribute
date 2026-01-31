<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

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
     * @phpstan-return array<string, array{string|\UnitEnum|null, mixed[], string|\UnitEnum, string, string}>
     */
    public static function values(): array
    {
        return [
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
                'image-200.jpg 200w',
                ['imagesrcset' => 'image-400.jpg 400w'],
                'image-200.jpg 200w',
                ' imagesrcset="image-200.jpg 200w"',
                "Should return new 'imagesrcset' after replacing the existing 'imagesrcset' attribute.",
            ],
            'string single' => [
                'image-400.jpg 400w',
                [],
                'image-400.jpg 400w',
                ' imagesrcset="image-400.jpg 400w"',
                'Should return the attribute value after setting it.',
            ],
            'string multiple' => [
                'image-400.jpg 400w, image-800.jpg 800w, image-1200.jpg 1200w',
                [],
                'image-400.jpg 400w, image-800.jpg 800w, image-1200.jpg 1200w',
                ' imagesrcset="image-400.jpg 400w, image-800.jpg 800w, image-1200.jpg 1200w"',
                'Should return the attribute value after setting multiple sources.',
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
