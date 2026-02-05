<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{ContentEditable, GlobalAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasContentEditableTest} test cases.
 *
 * Provides representative input/output pairs for the `contenteditable` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ContentEditableProvider
{
    /**
     * @phpstan-return array<string, array{bool|string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(ContentEditable::class, GlobalAttribute::CONTENTEDITABLE);

        $staticCase = [
            'boolean false' => [
                false,
                [],
                'false',
                ' contenteditable="false"',
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                true,
                [],
                'true',
                ' contenteditable="true"',
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
                'plaintext-only',
                ['contenteditable' => 'false'],
                'plaintext-only',
                ' contenteditable="plaintext-only"',
                "Should return new 'contenteditable' after replacing the existing 'contenteditable' attribute.",
            ],
            'string with boolean false' => [
                'false',
                [],
                'false',
                ' contenteditable="false"',
                'Should return the attribute value after setting it.',
            ],
            'string with boolean true' => [
                'true',
                [],
                'true',
                ' contenteditable="true"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['contenteditable' => 'true'],
                '',
                '',
                "Should unset the 'contenteditable' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
