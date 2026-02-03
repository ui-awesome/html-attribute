<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use Stringable;
use UIAwesome\Html\Attribute\Tests\Support\Stub\Values\{Backed, Unit};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasAutocompleteTest} test cases.
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
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum, string, string},
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'email';
            }
        };

        return [
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'enum backed' => [
                Backed::VALUE,
                [],
                Backed::VALUE,
                ' autocomplete="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' autocomplete="value"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
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
                'Should return the attribute value after setting it to on.',
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
                '',
                '',
                "Should unset the 'autocomplete' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
