<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

use PHPForge\Support\Stub\BackedString;
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasClassTest} test cases.
 */
final class ClassProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{array<array{value: string|Stringable|UnitEnum|null, override?: bool}>, string|null, string, string}
     * >
     */
    public static function values(): array
    {
        return [
            'append' => [
                [
                    ['value' => 'class-one'],
                    ['value' => 'class-two'],
                ],
                'class-one class-two',
                ' class="class-one class-two"',
                "Should append new class to existing 'class' attribute.",
            ],
            'empty string' => [
                [['value' => '']],
                null,
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'enum' => [
                [['value' => BackedString::VALUE]],
                'value',
                ' class="value"',
                'Should return the attribute value after setting it with an enum.',
            ],
            'multiple appends when override (true)' => [
                [
                    ['value' => 'class-one'],
                    ['value' => 'class-two'],
                    [
                        'override' => true,
                        'value' => 'class-three',
                    ],
                ],
                'class-three',
                ' class="class-three"',
                'Should override all previous class values when override flag is true.',
            ],
            'null' => [
                [['value' => null]],
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'override' => [
                [
                    ['value' => 'class-one'],
                    [
                        'override' => true,
                        'value' => 'class-override',
                    ],
                ],
                'class-override',
                ' class="class-override"',
                'Should return new attribute value after overriding the existing attribute value.',
            ],
            'string' => [
                [['value' => 'class-one']],
                'class-one',
                ' class="class-one"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                [
                    [
                        'value' => new class implements Stringable {
                            public function __toString(): string
                            {
                                return 'class-stringable';
                            }
                        },
                    ],
                ],
                'class-stringable',
                ' class="class-stringable"',
                'Should return the attribute value after setting it with a Stringable object.',
            ],
            'unset with null' => [
                [
                    ['value' => 'class-one'],
                    ['value' => null],
                ],
                null,
                '',
                "Should unset the 'class' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
