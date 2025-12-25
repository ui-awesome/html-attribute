<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Media;

final class WidthProvider
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
                '100px',
                ['width' => '200px'],
                ' width="100px"',
                "Should return new 'width' after replacing the existing 'width' attribute.",
            ],
            'string' => [
                '100px',
                [],
                ' width="100px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['width' => '100px'],
                '',
                "Should unset the 'width' attribute when 'null' is provided after a value.",
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
                '100px',
                ['width' => '200px'],
                '100px',
                "Should return new 'width' after replacing the existing 'width' attribute.",
            ],
            'string' => [
                '100px',
                [],
                '100px',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['width' => '100px'],
                '',
                "Should unset the 'width' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
