<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\EnumDataProvider;
use Stringable;
use UIAwesome\Html\Attribute\Values\{AsValue, ElementAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasAsTest} test cases.
 */
final class AsProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum|null, string, string}
     * >
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(AsValue::class, ElementAttribute::AS);

        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'script';
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
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'font',
                ['as' => 'image'],
                'font',
                ' as="font"',
                "Should return new 'as' after replacing the existing 'as' attribute.",
            ],
            'string' => [
                'script',
                [],
                'script',
                ' as="script"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' as="script"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['as' => 'style'],
                null,
                '',
                "Should unset the 'as' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
