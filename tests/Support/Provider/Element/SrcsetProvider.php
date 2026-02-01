<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Element;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasSrcsetTest} test cases.
 *
 * Provides representative input/output pairs for the `srcset` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class SrcsetProvider
{
    /**
     * @phpstan-return array<string, array{string|null, mixed[], string, string, string}>
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
                'small.jpg 480w, medium.jpg 800w',
                ['srcset' => 'old-small.jpg 480w, old-medium.jpg 800w'],
                'small.jpg 480w, medium.jpg 800w',
                ' srcset="small.jpg 480w, medium.jpg 800w"',
                "Should return new 'srcset' after replacing the existing 'srcset' attribute.",
            ],
            'string' => [
                'small.jpg 480w, medium.jpg 800w, large.jpg 1200w',
                [],
                'small.jpg 480w, medium.jpg 800w, large.jpg 1200w',
                ' srcset="small.jpg 480w, medium.jpg 800w, large.jpg 1200w"',
                'Should return the attribute value after setting it.',
            ],
            'string with pixel density descriptors' => [
                'image-1x.jpg 1x, image-2x.jpg 2x',
                [],
                'image-1x.jpg 1x, image-2x.jpg 2x',
                ' srcset="image-1x.jpg 1x, image-2x.jpg 2x"',
                'Should return the attribute value with pixel density descriptors after setting it.',
            ],
            'unset with null' => [
                null,
                ['srcset' => 'small.jpg 480w, medium.jpg 800w'],
                '',
                '',
                "Should unset the 'srcset' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
