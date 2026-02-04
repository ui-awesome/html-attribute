<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Element;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasHrefTest} test cases.
 *
 * Provides representative input/output pairs for the `href` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class HrefProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum, string, string},
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'https://example.com/page';
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
                ' href="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' href="value"',
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
            'string with fragment identifier' => [
                '#section',
                [],
                '#section',
                ' href="#section"',
                'Should return the attribute value after setting it.',
            ],
            'string with relative path' => [
                '/about',
                [],
                '/about',
                ' href="/about"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' href="https://example.com/page"',
                'Should return the attribute value after setting it with a Stringable instance.',
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
