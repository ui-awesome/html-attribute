<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Element;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasUsemapTest} test cases.
 *
 * Provides representative input/output pairs for the `usemap` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class UsemapProvider
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
                '#new-map',
                ['usemap' => '#old-map'],
                '#new-map',
                ' usemap="#new-map"',
                "Should return new 'usemap' after replacing the existing 'usemap' attribute.",
            ],
            'string' => [
                '#imagemap',
                [],
                '#imagemap',
                ' usemap="#imagemap"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['usemap' => '#imagemap'],
                '',
                '',
                "Should unset the 'usemap' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
