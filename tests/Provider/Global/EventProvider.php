<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

use PHPForge\Support\Stub\BackedInteger;
use Stringable;
use UIAwesome\Html\Attribute\Values\Event;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasEventsTest} test cases.
 *
 * Provides representative input/output pairs for `on*` event handler attributes.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class EventProvider
{
    /**
     * @phpstan-return array<string, array{mixed[]}>
     */
    public static function invalidKey(): array
    {
        return [
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
            'closure with array' => [
                ['onclick' => static fn(): array => ['key' => 'value']],
                [],
                " onclick='{\"key\":\"value\"}'",
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean false' => [
                ['onclick' => static fn(): bool => false],
                [],
                ' onclick="false"',
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean true' => [
                ['onclick' => static fn(): bool => true],
                [],
                ' onclick="true"',
                'Should return the attribute value after setting it.',
            ],
            'closure with empty string' => [
                ['onclick' => static fn(): string => ''],
                [],
                '',
                'Should return the attribute value after setting it.',
            ],
            'closure with enum' => [
                ['onclick' => static fn(): UnitEnum => BackedInteger::VALUE],
                [],
                ' onclick="1"',
                'Should return the attribute value after setting it.',
            ],
            'closure with float' => [
                ['onclick' => static fn(): float => 3.14],
                [],
                ' onclick="3.14"',
                'Should return the attribute value after setting it.',
            ],
            'closure with integer' => [
                ['onclick' => static fn(): int => 42],
                [],
                ' onclick="42"',
                'Should return the attribute value after setting it.',
            ],
            'closure with null' => [
                ['onclick' => static fn() => null],
                [],
                '',
                'Should return the attribute value after setting it.',
            ],
            'closure with string' => [
                ['onclick' => static fn(): string => "alert('hello')"],
                [],
                ' onclick="alert(&apos;hello&apos;)"',
                'Should return the attribute value after setting it.',
            ],
            'empty string' => [
                ['onclick' => ''],
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'enum value' => [
                ['onclick' => BackedInteger::VALUE],
                [],
                ' onclick="1"',
                'Should return the attribute value after setting it.',
            ],
            'mixed string and closure' => [
                [
                    'onclick' => "alert('click')",
                    'onsubmit' => static fn(): string => 'return validate()',
                ],
                [],
                ' onclick="alert(&apos;click&apos;)" onsubmit="return validate()"',
                "Should set multiple 'on*' event attributes with mixed string and closure values.",
            ],
            'string' => [
                ['onclick' => "alert('test')"],
                [],
                ' onclick="alert(&apos;test&apos;)"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                [
                    'onclick' => new class implements Stringable {
                        public function __toString(): string
                        {
                            return 'console.log("stringable")';
                        }
                    },
                ],
                [],
                ' onclick="console.log(&quot;stringable&quot;)"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                ['onclick' => null],
                ['onclick' => "alert('old')"],
                '',
                "Should unset the 'onclick' attribute when 'null' is provided after a value.",
            ],
            'without prefix' => [
                ['click' => "alert('test')"],
                [],
                ' onclick="alert(&apos;test&apos;)"',
                "Should add the 'on' prefix to keys when setting attributes.",
            ],
        ];
    }

    /**
     * @phpstan-return array<
     *   string,
     *   array{string|UnitEnum, string|Stringable|UnitEnum|\Closure(): mixed|null, mixed[], string},
     * >
     */
    public static function value(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'console.log("test")';
            }
        };

        return [
            'closure with array' => [
                'onclick',
                static fn(): array => ['key' => 'value'],
                ['onclick' => ['key' => 'value']],
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean false' => [
                'onclick',
                static fn(): bool => false,
                ['onclick' => 'false'],
                'Should return the attribute value after setting it.',
            ],
            'closure with boolean true' => [
                'onclick',
                static fn(): bool => true,
                ['onclick' => 'true'],
                'Should return the attribute value after setting it.',
            ],
            'closure with empty string' => [
                'onclick',
                static fn(): string => '',
                ['onclick' => ''],
                'Should return the attribute value after setting it.',
            ],
            'closure with enum' => [
                'onclick',
                static fn(): UnitEnum => BackedInteger::VALUE,
                ['onclick' => BackedInteger::VALUE],
                'Should return the attribute value after setting it.',
            ],
            'closure with float' => [
                'onclick',
                static fn(): float => 3.14,
                ['onclick' => 3.14],
                'Should return the attribute value after setting it.',
            ],
            'closure with integer' => [
                'onclick',
                static fn(): int => 42,
                ['onclick' => 42],
                'Should return the attribute value after setting it.',
            ],
            'closure with null' => [
                'onclick',
                static fn() => null,
                ['onclick' => null],
                'Should unset the attribute when closure returns null.',
            ],
            'closure with string' => [
                'onclick',
                static fn(): string => "alert('closure')",
                ['onclick' => "alert('closure')"],
                'Should return the attribute value after setting it.',
            ],
            'empty string' => [
                'onclick',
                '',
                ['onclick' => ''],
                'Should return an empty string when setting an empty string.',
            ],
            'enum key' => [
                Event::INVALID,
                'value',
                ['oninvalid' => 'value'],
                'Should return the attribute value after setting it.',
            ],
            'enum value' => [
                'onsubmit',
                BackedInteger::VALUE,
                ['onsubmit' => BackedInteger::VALUE],
                'Should return the attribute value after setting it.',
            ],
            'string' => [
                'onclick',
                "alert('test')",
                ['onclick' => "alert('test')"],
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                'onclick',
                $stringable,
                ['onclick' => $stringable],
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                'onclick',
                null,
                ['onclick' => null],
                'Should unset the attribute when null is provided.',
            ],
            'without prefix' => [
                'click',
                "alert('test')",
                ['onclick' => "alert('test')"],
                "Should add the 'on' prefix to keys when setting attributes.",
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
                return 'console.log("bulk")';
            }
        };

        $enumCases = [];

        foreach (Event::cases() as $case) {
            $eventName = $case->value;
            $enumCases["enum: {$eventName}"] = [
                [$case->value => "alert('test')"],
                [$eventName => "alert('test')"],
                "Should normalize enum case '{$case->name}' to attribute '{$eventName}'.",
            ];
        }

        $staticCases = [
            'closure with empty string' => [
                ['onclick' => static fn(): string => ''],
                ['onclick' => ''],
                'Should return the attribute value after setting it.',
            ],
            'closure with null' => [
                ['onclick' => static fn() => null],
                ['onclick' => null],
                'Should unset the attribute when closure returns null.',
            ],
            'closure with string' => [
                ['onclick' => static fn(): string => "alert('closure')"],
                ['onclick' => "alert('closure')"],
                'Should return the attribute value after setting it.',
            ],
            'empty array' => [
                [],
                [],
                'Should return an empty array when no events are provided.',
            ],
            'empty string' => [
                ['onclick' => ''],
                ['onclick' => ''],
                'Should return an empty string when setting an empty string.',
            ],
            'multiple events' => [
                [
                    'onclick' => "alert('click')",
                    'onsubmit' => 'return validate()',
                    'onblur' => "console.log('blur')",
                ],
                [
                    'onclick' => "alert('click')",
                    'onsubmit' => 'return validate()',
                    'onblur' => "console.log('blur')",
                ],
                'Should set multiple event attributes at once.',
            ],
            'string' => [
                ['onclick' => "alert('test')"],
                ['onclick' => "alert('test')"],
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                ['onclick' => $stringable],
                ['onclick' => $stringable],
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                ['onclick' => null],
                ['onclick' => null],
                'Should unset the attribute when null is provided.',
            ],
            'without prefix' => [
                ['click' => "alert('test')"],
                ['onclick' => "alert('test')"],
                "Should add the 'on' prefix to keys when setting attributes.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
