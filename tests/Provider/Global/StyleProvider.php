<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

use PHPForge\Support\Stub\BackedString;
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasStyleTest} test cases.
 */
final class StyleProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{mixed[]|string|Stringable|UnitEnum|null, mixed[], mixed[]|string|Stringable|UnitEnum|null, string, string},
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'color: green;';
            }
        };

        return [
            'array' => [
                ['color' => 'red', 'font-size' => '16px'],
                [],
                ['color' => 'red', 'font-size' => '16px'],
                " style='color: red; font-size: 16px;'",
                'Should return the attribute value after setting it with an array.',
            ],
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'enum' => [
                ['color' => BackedString::VALUE],
                [],
                ['color' => BackedString::VALUE],
                " style='color: value;'",
                'Should return the enum instance after setting it.',
            ],
            'enum replace existing' => [
                ['color' => BackedString::VALUE],
                ['style' => 'color: red;'],
                ['color' => BackedString::VALUE],
                " style='color: value;'",
                "Should return new 'style' after replacing the existing 'style' attribute with enum value.",
            ],
            'null' => [
                null,
                [],
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'color: blue;',
                ['style' => 'color: red;'],
                'color: blue;',
                " style='color: blue;'",
                "Should return new 'style' after replacing the existing 'style' attribute.",
            ],
            'string' => [
                'color: red;',
                [],
                'color: red;',
                " style='color: red;'",
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                " style='color: green;'",
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['style' => 'color: red;'],
                null,
                '',
                "Should unset the 'style' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
