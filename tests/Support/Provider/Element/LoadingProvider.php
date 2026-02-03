<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Element;

use PHPForge\Support\EnumDataProvider;
use Stringable;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, Loading};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasLoadingTest} test cases.
 *
 * Provides representative input/output pairs for the `loading` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class LoadingProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum, string, string},
     * >
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Loading::class, ElementAttribute::LOADING);

        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'lazy';
            }
        };

        $staticCase = [
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
                'lazy',
                ['loading' => 'eager'],
                'lazy',
                ' loading="lazy"',
                "Should return new 'loading' after replacing the existing 'loading' attribute.",
            ],
            'string' => [
                'eager',
                [],
                'eager',
                ' loading="eager"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' loading="lazy"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['loading' => 'lazy'],
                '',
                '',
                "Should unset the 'loading' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
