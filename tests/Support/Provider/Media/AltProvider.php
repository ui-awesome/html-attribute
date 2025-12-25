<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Media;

final class AltProvider
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
                'A descriptive alt text.',
                ['alt' => 'A different alt text.'],
                ' alt="A descriptive alt text."',
                "Should return new 'alt' after replacing the existing 'alt' attribute.",
            ],
            'string' => [
                'A descriptive alt text.',
                [],
                ' alt="A descriptive alt text."',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['alt' => 'A different alt text.'],
                '',
                "Should unset the 'alt' attribute when 'null' is provided after a value.",
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
                'A descriptive alt text.',
                ['alt' => 'A different alt text.'],
                'A descriptive alt text.',
                "Should return new 'alt' after replacing the existing 'alt' attribute.",
            ],
            'string' => [
                'A descriptive alt text.',
                [],
                'A descriptive alt text.',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['alt' => 'A descriptive alt text.'],
                '',
                "Should unset the 'alt' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
