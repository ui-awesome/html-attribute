<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

use PHPForge\Support\Stub\BackedInteger;
use Stringable;
use UIAwesome\Html\Attribute\Values\Data;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasDataTest} test cases.
 *
 * Provides representative input/output pairs for `data-*` attributes.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DataProvider
{
    /**
     * @phpstan-return array<string, array{mixed[]}>
     */
    public static function invalidKey(): array
    {
        return [
            'boolean false' => [
                [false => 'value'],
            ],
            'boolean true' => [
                [true => 'value'],
            ],
            'empty string' => [
                ['' => 'value'],
            ],
            'integer' => [
                [1 => 'value'],
            ],
        ];
    }

    /**
     * @phpstan-return array<string, array{scalar|UnitEnum|null, string}>
     */
    public static function invalidSingleKey(): array
    {
        return [
            'empty string' => [
                '',
                'value',
            ],
            'enum key' => [
                BackedInteger::VALUE,
                'value',
            ],
        ];
    }

    /**
     * @phpstan-return array<string, array{mixed[], mixed[], string, string}>
     */
    public static function renderAttribute(): array
    {
        return [
            'boolean false' => [
                ['data-value' => static fn(): bool => false],
                [],
                '',
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                ['data-value' => static fn(): bool => true],
                [],
                ' data-value',
                'Should return the attribute value after setting it.',
            ],
            'closure with array' => [
                ['data-value' => static fn(): array => ['key' => 'value']],
                [],
                ' data-value=\'{"key":"value"}\'',
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean (false)' => [
                ['data-value' => static fn(): bool => false],
                [],
                '',
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean (true)' => [
                ['data-value' => static fn(): bool => true],
                [],
                ' data-value',
                'Should return the attribute value after setting it.',
            ],
            'closure with empty string' => [
                ['data-value' => static fn(): string => ''],
                [],
                '',
                'Should return the attribute value after setting it.',
            ],
            'closure with enum' => [
                ['data-value' => static fn(): BackedInteger => BackedInteger::VALUE],
                [],
                ' data-value="1"',
                'Should return the attribute value after setting it.',
            ],
            'closure with float' => [
                ['data-value' => static fn(): float => 0.42],
                [],
                ' data-value="0.42"',
                'Should return the attribute value after setting it.',
            ],
            'closure with integer' => [
                ['data-value' => static fn(): int => 42],
                [],
                ' data-value="42"',
                'Should return the attribute value after setting it.',
            ],
            'closure with null' => [
                ['data-value' => static fn(): string|null => null],
                [],
                '',
                'Should return the attribute value after setting it.',
            ],
            'closure with string' => [
                ['data-value' => static fn(): string => 'action'],
                [],
                ' data-value="action"',
                'Should return the attribute value after setting it.',
            ],
            'empty string' => [
                ['data-value' => ''],
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'enum value' => [
                ['data-size' => BackedInteger::VALUE],
                [],
                ' data-size="1"',
                'Should return the attribute value after setting it.',
            ],
            'float' => [
                ['data-value' => 0.42],
                [],
                ' data-value="0.42"',
                'Should return the attribute value after setting it.',
            ],
            'hyphenated key' => [
                ['data-custom-action' => 'value'],
                [],
                ' data-custom-action="value"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                ['data-value' => 42],
                [],
                ' data-value="42"',
                'Should return the attribute value after setting it.',
            ],
            'mixed string and closure' => [
                [
                    'data-action' => 'action',
                    'data-callback' => static fn(): string => 'callback',
                ],
                [],
                ' data-action="action" data-callback="callback"',
                "Should set multiple 'data' attributes with mixed string and closure values.",
            ],
            'string' => [
                ['data-action' => 'action'],
                [],
                ' data-action="action"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                [
                    'data-value' => new class implements Stringable {
                        public function __toString(): string
                        {
                            return 'stringable-value';
                        }
                    },
                ],
                [],
                ' data-value="stringable-value"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                ['data-value' => null],
                [],
                '',
                "Should unset the 'data-value' attribute when 'null' is provided after a value.",
            ],
            'without data prefix' => [
                ['value' => 'test'],
                [],
                ' data-value="test"',
                "Should normalize the key by adding 'data-' prefix if missing.",
            ],
        ];
    }

    /**
     * @phpstan-return array<
     *   string,
     *   array{string|UnitEnum, scalar|Stringable|UnitEnum|null|\Closure(): mixed, mixed[], string},
     * >
     */
    public static function value(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'stringable-value';
            }
        };

        return [
            'boolean false' => [
                'data-value',
                false,
                ['data-value' => false],
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                'data-value',
                true,
                ['data-value' => true],
                'Should return the attribute value after setting it.',
            ],
            'closure with array' => [
                'data-value',
                static fn(): array => ['key' => 'value'],
                ['data-value' => ['key' => 'value']],
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean false' => [
                'data-value',
                static fn(): bool => false,
                ['data-value' => false],
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean true' => [
                'data-value',
                static fn(): bool => true,
                ['data-value' => true],
                'Should return the attribute value after setting it.',
            ],
            'closure with empty string' => [
                'data-value',
                static fn(): string => '',
                ['data-value' => ''],
                'Should return the attribute value after setting it.',
            ],
            'closure with enum' => [
                'data-value',
                static fn(): BackedInteger => BackedInteger::VALUE,
                ['data-value' => BackedInteger::VALUE],
                'Should return the attribute value after setting it.',
            ],
            'closure with float' => [
                'data-value',
                static fn(): float => 0.42,
                ['data-value' => 0.42],
                'Should return the attribute value after setting it.',
            ],
            'closure with integer' => [
                'data-value',
                static fn(): int => 42,
                ['data-value' => 42],
                'Should return the attribute value after setting it.',
            ],
            'closure with null' => [
                'data-value',
                static fn(): string|null => null,
                [],
                'Should return the attribute value after setting it.',
            ],
            'closure with string' => [
                'data-value',
                static fn(): string => 'Close',
                ['data-value' => 'Close'],
                'Should return the attribute value after setting it.',
            ],
            'empty string' => [
                'data-value',
                '',
                ['data-value' => ''],
                'Should return an empty string when setting an empty string.',
            ],
            'enum key' => [
                Data::ACTION,
                'action',
                ['data-action' => 'action'],
                'Should return the attribute value after setting it.',
            ],
            'enum value' => [
                'data-size',
                BackedInteger::VALUE,
                ['data-size' => BackedInteger::VALUE],
                'Should return the attribute value after setting it.',
            ],
            'float' => [
                'data-value',
                0.42,
                ['data-value' => 0.42],
                'Should return the attribute value after setting it.',
            ],
            'hyphenated key' => [
                'data-custom-action',
                'value',
                ['data-custom-action' => 'value'],
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                'data-value',
                42,
                ['data-value' => 42],
                'Should return the attribute value after setting it.',
            ],
            'string' => [
                'data-action',
                'action',
                ['data-action' => 'action'],
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                'data-value',
                $stringable,
                ['data-value' => $stringable],
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                'value',
                null,
                [],
                "Should unset the 'data-value' attribute when 'null' is provided after a value.",
            ],
            'without data prefix' => [
                'value',
                'test',
                ['data-value' => 'test'],
                "Should normalize the key by adding 'data-' prefix if missing.",
            ],
        ];
    }

    /**
     * @phpstan-return array<string, array{mixed[], mixed[], string}>
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'stringable-value';
            }
        };

        $enumCases = [];

        foreach (Data::cases() as $case) {
            $enumCases[$case->value] = [
                [$case->value => 'value'],
                ["data-{$case->value}" => 'value'],
                'Should return the attribute value after setting it.',
            ];
        }

        $staticCases = [
            'boolean false' => [
                ['data-value' => false],
                ['data-value' => false],
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                ['data-value' => true],
                ['data-value' => true],
                'Should return the attribute value after setting it.',
            ],
            'closure with array' => [
                ['data-value' => static fn(): array => ['key' => 'value']],
                ['data-value' => ['key' => 'value']],
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean false' => [
                ['data-value' => static fn(): bool => false],
                ['data-value' => false],
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean true' => [
                ['data-value' => static fn(): bool => true],
                ['data-value' => true],
                'Should return the attribute value after setting it.',
            ],
            'closure with empty string' => [
                ['data-value' => static fn(): string => ''],
                ['data-value' => ''],
                'Should return the attribute value after setting it.',
            ],
            'closure with enum' => [
                ['data-value' => static fn(): BackedInteger => BackedInteger::VALUE],
                ['data-value' => BackedInteger::VALUE],
                'Should return the attribute value after setting it.',
            ],
            'closure with float' => [
                ['data-value' => static fn(): float => 0.42],
                ['data-value' => 0.42],
                'Should return the attribute value after setting it.',
            ],
            'closure with integer' => [
                ['data-value' => static fn(): int => 42],
                ['data-value' => 42],
                'Should return the attribute value after setting it.',
            ],
            'closure with null' => [
                ['data-value' => static fn(): string|null => null],
                [],
                'Should return the attribute value after setting it.',
            ],
            'closure with string' => [
                ['data-value' => static fn(): string => 'Close'],
                ['data-value' => 'Close'],
                'Should return the attribute value after setting it.',
            ],
            'empty string' => [
                ['data-value' => ''],
                ['data-value' => ''],
                'Should return an empty string when setting an empty string.',
            ],
            'enum value' => [
                ['data-size' => BackedInteger::VALUE],
                ['data-size' => BackedInteger::VALUE],
                'Should return the attribute value after setting it.',
            ],
            'float' => [
                ['data-value' => 0.42],
                ['data-value' => 0.42],
                'Should return the attribute value after setting it.',
            ],
            'hyphenated key' => [
                ['data-custom-action' => 'value'],
                ['data-custom-action' => 'value'],
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                ['data-value' => 42],
                ['data-value' => 42],
                'Should return the attribute value after setting it.',
            ],
            'mixed string and closure' => [
                [
                    'data-action' => 'action',
                    'data-callback' => static fn(): string => 'action',
                ],
                [
                    'data-action' => 'action',
                    'data-callback' => 'action',
                ],
                "Should set multiple 'data' attributes with mixed string and closure values.",
            ],
            'string' => [
                ['data-action' => 'action'],
                ['data-action' => 'action'],
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                ['data-value' => $stringable],
                ['data-value' => $stringable],
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                ['data-value' => null],
                [],
                "Should unset the 'data-value' attribute when 'null' is provided after a value.",
            ],
            'without data prefix' => [
                ['value' => 'test'],
                ['data-value' => 'test'],
                "Should normalize the key by adding 'data-' prefix if missing.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
