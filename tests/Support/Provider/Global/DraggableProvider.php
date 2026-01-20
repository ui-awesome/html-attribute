<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{Draggable, GlobalAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasDraggableTest} test cases.
 *
 * Provides representative input/output pairs for the `draggable` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DraggableProvider
{
    /**
     * @phpstan-return array<string, array{bool|string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Draggable::class, GlobalAttribute::DRAGGABLE);

        $staticCase = [
            'boolean false' => [
                false,
                [],
                'false',
                ' draggable="false"',
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                true,
                [],
                'true',
                ' draggable="true"',
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
                'true',
                ['draggable' => 'false'],
                'true',
                ' draggable="true"',
                "Should return new 'draggable' after replacing the existing 'draggable' attribute.",
            ],
            'string boolean false' => [
                'false',
                [],
                'false',
                ' draggable="false"',
                'Should return the attribute value after setting it.',
            ],
            'string boolean true' => [
                'true',
                [],
                'true',
                ' draggable="true"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['draggable' => 'true'],
                '',
                '',
                "Should unset the 'draggable' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
