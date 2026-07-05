<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\EnumDataProvider;
use Stringable;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, MetaName};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasNameTest} test cases.
 */
final class NameProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum|null, string, string},
     * >
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(MetaName::class, ElementAttribute::NAME);

        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'description';
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
                'description',
                ['name' => 'viewport'],
                'description',
                ' name="description"',
                "Should return new 'name' after replacing the existing 'name' attribute.",
            ],
            'string' => [
                'viewport',
                [],
                'viewport',
                ' name="viewport"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' name="description"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['name' => 'viewport'],
                null,
                '',
                "Should unset the 'name' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
