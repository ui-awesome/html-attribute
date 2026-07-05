<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasDownloadTest} test cases.
 */
final class DownloadProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{bool|string|Stringable|UnitEnum|null, mixed[], bool|string|Stringable|UnitEnum|null, string, string}
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'my-file.pdf';
            }
        };

        return [
            'boolean true' => [
                true,
                [],
                true,
                ' download',
                'Should return the attribute value after setting it.',
            ],
            'boolean false' => [
                false,
                [],
                false,
                '',
                'Should return the attribute value after setting it.',
            ],
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
                ' download="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' download="value"',
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
                'new-file.pdf',
                ['download' => 'old-file.pdf'],
                'new-file.pdf',
                ' download="new-file.pdf"',
                "Should return new 'download' after replacing the existing 'download' attribute.",
            ],
            'string' => [
                'my-file.pdf',
                [],
                'my-file.pdf',
                ' download="my-file.pdf"',
                'Should return the attribute value after setting it to a filename.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' download="my-file.pdf"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['download' => 'file.pdf'],
                null,
                '',
                "Should unset the 'download' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
