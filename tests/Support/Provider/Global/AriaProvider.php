<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

use Stringable;
use UIAwesome\Html\Attribute\Tests\Support\Stub\Values\{ButtonSize, Priority};
use UIAwesome\Html\Attribute\Values\Aria;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasAriaTest} test cases.
 *
 * Provides representative input/output pairs for `aria-*` attributes.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class AriaProvider
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
                Priority::HIGH,
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
                ['aria-pressed' => false],
                [],
                ' aria-pressed="false"',
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                ['aria-pressed' => true],
                [],
                ' aria-pressed="true"',
                'Should return the attribute value after setting it.',
            ],
            'closure with array' => [
                ['aria-controls' => static fn(): array => ['key' => 'value']],
                [],
                " aria-controls='{\"key\":\"value\"}'",
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean false' => [
                ['aria-pressed' => static fn(): bool => false],
                [],
                ' aria-pressed="false"',
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean true' => [
                ['aria-pressed' => static fn(): bool => true],
                [],
                ' aria-pressed="true"',
                'Should return the attribute value after setting it.',
            ],
            'closure with empty string' => [
                ['aria-label' => static fn(): string => ''],
                [],
                '',
                'Should return the attribute value after setting it.',
            ],
            'closure with enum' => [
                ['aria-size' => static fn(): ButtonSize => ButtonSize::SMALL],
                [],
                ' aria-size="sm"',
                'Should return the attribute value after setting it.',
            ],
            'closure with float' => [
                ['aria-value' => static fn(): float => 0.42],
                [],
                ' aria-value="0.42"',
                'Should return the attribute value after setting it.',
            ],
            'closure with integer' => [
                ['aria-value' => static fn(): int => 42],
                [],
                ' aria-value="42"',
                'Should return the attribute value after setting it.',
            ],
            'closure with null' => [
                ['aria-label' => static fn(): string|null => null],
                [],
                '',
                'Should return the attribute value after setting it.',
            ],
            'closure with string' => [
                ['aria-label' => static fn(): string => 'Close'],
                [],
                ' aria-label="Close"',
                'Should return the attribute value after setting it.',
            ],
            'empty string' => [
                ['aria-label' => ''],
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'enum value' => [
                ['aria-size' => ButtonSize::SMALL],
                [],
                ' aria-size="sm"',
                'Should return the attribute value after setting it.',
            ],
            'float' => [
                ['aria-value' => 0.42],
                [],
                ' aria-value="0.42"',
                'Should return the attribute value after setting it.',
            ],
            'hyphenated key' => [
                ['aria-describedby' => 'desc'],
                [],
                ' aria-describedby="desc"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                ['aria-value' => 42],
                [],
                ' aria-value="42"',
                'Should return the attribute value after setting it.',
            ],
            'mixed string and closure' => [
                [
                    'aria-label' => 'Close',
                    'aria-controls' => static fn(): string => 'modal-1',
                ],
                [],
                ' aria-label="Close" aria-controls="modal-1"',
                "Should set multiple 'aria' attributes with mixed string and closure values.",
            ],
            'string' => [
                ['aria-label' => 'Close'],
                [],
                ' aria-label="Close"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                [
                    'aria-label' => new class implements Stringable {
                        public function __toString(): string
                        {
                            return 'stringable-value';
                        }
                    },
                ],
                [],
                ' aria-label="stringable-value"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                ['aria-label' => null],
                [],
                '',
                "Should unset the 'aria-label' attribute when 'null' is provided after a value.",
            ],
            'without aria prefix' => [
                ['pressed' => true],
                [],
                ' aria-pressed="true"',
                'Should normalize key without aria prefix when setting the attribute.',
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
                'aria-pressed',
                false,
                ['aria-pressed' => 'false'],
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                'aria-pressed',
                true,
                ['aria-pressed' => 'true'],
                'Should return the attribute value after setting it.',
            ],
            'closure with array' => [
                'aria-controls',
                static fn(): array => ['key' => 'value'],
                ['aria-controls' => ['key' => 'value']],
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean false' => [
                'aria-pressed',
                static fn(): bool => false,
                ['aria-pressed' => 'false'],
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean true' => [
                'aria-pressed',
                static fn(): bool => true,
                ['aria-pressed' => 'true'],
                'Should return the attribute value after setting it.',
            ],
            'closure with empty string' => [
                'aria-label',
                static fn(): string => '',
                ['aria-label' => ''],
                'Should return the attribute value after setting it.',
            ],
            'closure with enum' => [
                'aria-size',
                static fn(): ButtonSize => ButtonSize::SMALL,
                ['aria-size' => ButtonSize::SMALL],
                'Should return the attribute value after setting it.',
            ],
            'closure with float' => [
                'aria-value',
                static fn(): float => 0.42,
                ['aria-value' => 0.42],
                'Should return the attribute value after setting it.',
            ],
            'closure with integer' => [
                'aria-value',
                static fn(): int => 42,
                ['aria-value' => 42],
                'Should return the attribute value after setting it.',
            ],
            'closure with null' => [
                'aria-label',
                static fn(): string|null => null,
                [],
                'Should return the attribute value after setting it.',
            ],
            'closure with string' => [
                'aria-label',
                static fn(): string => 'Close',
                ['aria-label' => 'Close'],
                'Should return the attribute value after setting it.',
            ],
            'empty string' => [
                'aria-label',
                '',
                ['aria-label' => ''],
                'Should return an empty string when setting an empty string.',
            ],
            'enum key' => [
                Aria::ATOMIC,
                'value',
                ['aria-atomic' => 'value'],
                'Should return the attribute value after setting it.',
            ],
            'enum value' => [
                'aria-size',
                ButtonSize::SMALL,
                ['aria-size' => ButtonSize::SMALL],
                'Should return the attribute value after setting it.',
            ],
            'float' => [
                'aria-value',
                0.42,
                ['aria-value' => 0.42],
                'Should return the attribute value after setting it.',
            ],
            'hyphenated key' => [
                'aria-describedby',
                'desc',
                ['aria-describedby' => 'desc'],
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                'aria-value',
                42,
                ['aria-value' => 42],
                'Should return the attribute value after setting it.',
            ],
            'mixed string and closure' => [
                'aria-controls',
                static fn(): string => 'modal-1',
                ['aria-controls' => 'modal-1'],
                'Should return the attribute value after setting it.',
            ],
            'string' => [
                'aria-label',
                'Close',
                ['aria-label' => 'Close'],
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                'aria-label',
                $stringable,
                ['aria-label' => $stringable],
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                'aria-label',
                null,
                [],
                "Should unset the 'aria-label' attribute when 'null' is provided after a value.",
            ],
            'without aria prefix' => [
                'pressed',
                true,
                ['aria-pressed' => 'true'],
                'Should normalize key without aria prefix when setting the attribute.',
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

        foreach (Aria::cases() as $case) {
            $enumCases[$case->value] = [
                [$case->value => 'value'],
                ["aria-{$case->value}" => 'value'],
                'Should return the attribute value after setting it.',
            ];
        }

        $staticCases = [
            'boolean false' => [
                ['aria-pressed' => false],
                ['aria-pressed' => 'false'],
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                ['aria-pressed' => true],
                ['aria-pressed' => 'true'],
                'Should return the attribute value after setting it.',
            ],
            'closure with array' => [
                ['aria-controls' => static fn(): array => ['key' => 'value']],
                ['aria-controls' => ['key' => 'value']],
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean false' => [
                ['aria-pressed' => static fn(): bool => false],
                ['aria-pressed' => 'false'],
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean true' => [
                ['aria-pressed' => static fn(): bool => true],
                ['aria-pressed' => 'true'],
                'Should return the attribute value after setting it.',
            ],
            'closure with empty string' => [
                ['aria-label' => static fn(): string => ''],
                ['aria-label' => ''],
                'Should return the attribute value after setting it.',
            ],
            'closure with enum' => [
                ['aria-size' => static fn(): ButtonSize => ButtonSize::SMALL],
                ['aria-size' => ButtonSize::SMALL],
                'Should return the attribute value after setting it.',
            ],
            'closure with float' => [
                ['aria-value' => static fn(): float => 0.42],
                ['aria-value' => 0.42],
                'Should return the attribute value after setting it.',
            ],
            'closure with integer' => [
                ['aria-value' => static fn(): int => 42],
                ['aria-value' => 42],
                'Should return the attribute value after setting it.',
            ],
            'closure with null' => [
                ['aria-label' => static fn(): string|null => null],
                [],
                'Should return the attribute value after setting it.',
            ],
            'closure with string' => [
                ['aria-label' => static fn(): string => 'Close'],
                ['aria-label' => 'Close'],
                'Should return the attribute value after setting it.',
            ],
            'empty string' => [
                ['aria-label' => ''],
                ['aria-label' => ''],
                'Should return an empty string when setting an empty string.',
            ],
            'enum value' => [
                ['aria-size' => ButtonSize::SMALL],
                ['aria-size' => ButtonSize::SMALL],
                'Should return the attribute value after setting it.',
            ],
            'float' => [
                ['aria-value' => 0.42],
                ['aria-value' => 0.42],
                'Should return the attribute value after setting it.',
            ],
            'hyphenated key' => [
                ['aria-describedby' => 'desc'],
                ['aria-describedby' => 'desc'],
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                ['aria-value' => 42],
                ['aria-value' => 42],
                'Should return the attribute value after setting it.',
            ],
            'mixed string and closure' => [
                [
                    'aria-label' => 'Close',
                    'aria-controls' => static fn(): string => 'modal-1',
                ],
                [
                    'aria-label' => 'Close',
                    'aria-controls' => 'modal-1',
                ],
                "Should set multiple 'aria' attributes with mixed string and closure values.",
            ],
            'string' => [
                ['aria-label' => 'Close'],
                ['aria-label' => 'Close'],
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                ['aria-label' => $stringable],
                ['aria-label' => $stringable],
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                ['aria-label' => null],
                [],
                "Should unset the 'aria-label' attribute when 'null' is provided after a value.",
            ],
            'without aria prefix' => [
                ['pressed' => true],
                ['aria-pressed' => 'true'],
                'Should normalize key without aria prefix when setting the attribute.',
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
