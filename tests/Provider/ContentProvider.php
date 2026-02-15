<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasContentTest} test cases.
 *
 * Provides representative input/output pairs for the `content` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ContentProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum|null, string, string}
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'width=device-width, initial-scale=1';
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
                ' content="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' content="value"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'new-content',
                ['content' => 'old-content'],
                'new-content',
                ' content="new-content"',
                "Should return new 'content' after replacing the existing 'content' attribute.",
            ],
            'string' => [
                'width=device-width, initial-scale=1',
                [],
                'width=device-width, initial-scale=1',
                ' content="width=device-width, initial-scale=1"',
                'Should return the attribute value after setting it.',
            ],
            'string with special chars' => [
                '3;url=https://example.com',
                [],
                '3;url=https://example.com',
                ' content="3;url=https://example.com"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' content="width=device-width, initial-scale=1"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['content' => 'some-content'],
                null,
                '',
                "Should unset the 'content' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
