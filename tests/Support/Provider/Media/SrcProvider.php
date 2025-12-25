<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Media;

final class SrcProvider
{
    /**
     * @phpstan-return array<string, array{string|null, mixed[], string, string}>
     */
    public static function renderAttribute(): array
    {
        return [
            'empty string' => [
                '',
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'http://example.com/image.png',
                ['src' => 'http://example.com/old-image.png'],
                ' src="http://example.com/image.png"',
                "Should return new 'src' after replacing the existing 'src' attribute.",
            ],
            'string' => [
                'http://example.com/image.png',
                [],
                ' src="http://example.com/image.png"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['src' => 'http://example.com/image.png'],
                '',
                "Should unset the 'src' attribute when 'null' is provided after a value.",
            ],
        ];
    }

    /**
     * @phpstan-return array<string, array{string|null, mixed[], string, string}>
     */
    public static function values(): array
    {
        return [
            'empty string' => [
                '',
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'http://example.com/image.png',
                ['src' => 'http://example.com/old-image.png'],
                'http://example.com/image.png',
                "Should return new 'src' after replacing the existing 'src' attribute.",
            ],
            'string' => [
                'http://example.com/image.png',
                [],
                'http://example.com/image.png',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['src' => 'http://example.com/image.png'],
                '',
                "Should unset the 'src' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
