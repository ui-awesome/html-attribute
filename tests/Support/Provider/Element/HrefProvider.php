<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Element;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasHrefTest} test cases.
 *
 * Provides representative input/output pairs for the `href` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class HrefProvider
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
                'https://example.com/new',
                ['href' => 'https://example.com/old'],
                'https://example.com/new',
                ' href="https://example.com/new"',
                "Should return new 'href' after replacing the existing 'href' attribute.",
            ],
            'string' => [
                'https://example.com/page',
                [],
                'https://example.com/page',
                ' href="https://example.com/page"',
                'Should return the attribute value after setting it.',
            ],
            'string fragment identifier' => [
                '#section',
                [],
                '#section',
                ' href="#section"',
                'Should return a fragment identifier as the href attribute value.',
            ],
            'string relative path' => [
                '/about',
                [],
                '/about',
                ' href="/about"',
                'Should return a relative path as the href attribute value.',
            ],
            'unset with null' => [
                null,
                ['href' => 'https://example.com/old'],
                '',
                '',
                "Should unset the 'href' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
