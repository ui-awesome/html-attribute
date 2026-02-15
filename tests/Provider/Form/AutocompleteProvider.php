<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Form;

use PHPForge\Support\EnumDataProvider;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Attribute, Autocomplete};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Form\HasAutocompleteTest} test cases.
 *
 * Provides representative input/output pairs for the `autocomplete` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class AutocompleteProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum|null, string, string},
     * >
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Autocomplete::class, Attribute::AUTOCOMPLETE);

        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'email';
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
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'on',
                ['autocomplete' => 'email'],
                'on',
                ' autocomplete="on"',
                "Should return new 'autocomplete' after replacing the existing 'autocomplete' attribute.",
            ],
            'string' => [
                'on',
                [],
                'on',
                ' autocomplete="on"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' autocomplete="email"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['autocomplete' => 'on'],
                null,
                '',
                "Should unset the 'autocomplete' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$enumCases, ...$staticCases];
    }
}
