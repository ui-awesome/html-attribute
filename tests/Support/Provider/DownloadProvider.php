<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasDownloadTest} test cases.
 *
 * Provides representative input/output pairs for the `download` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DownloadProvider
{
    /**
     * @phpstan-return array<string, array{bool|string|null, mixed[], bool|string, string, string}>
     */
    public static function values(): array
    {
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
            'null' => [
                null,
                [],
                '',
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
            'unset with null' => [
                null,
                ['download' => 'file.pdf'],
                '',
                '',
                "Should unset the 'download' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
