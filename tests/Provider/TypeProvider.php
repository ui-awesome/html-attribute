<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\EnumDataProvider;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Attribute, Type};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasTypeTest} test cases.
 *
 * Provides representative input/output pairs for the `type` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class TypeProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum, string, string}
     * >
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Type::class, Attribute::TYPE);

        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'text/css';
            }
        };

        $staticCases = [
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
                'text/css',
                ['type' => 'text'],
                'text/css',
                ' type="text/css"',
                "Should return new 'type' after replacing the existing 'type' attribute.",
            ],
            'string' => [
                'text',
                [],
                'text',
                ' type="text"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' type="text/css"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['type' => 'text/css'],
                '',
                '',
                "Should unset the 'type' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
