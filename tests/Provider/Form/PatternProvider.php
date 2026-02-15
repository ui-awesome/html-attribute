<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Form;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Form\HasPatternTest} test cases.
 *
 * Provides representative input/output pairs for the `pattern` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PatternProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum|null, string, string},
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return '[a-zA-Z]*';
            }
        };

        return [
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return empty when setting an empty string.',
            ],
            'enum backed string' => [
                BackedString::VALUE,
                [],
                BackedString::VALUE,
                ' pattern="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' pattern="value"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '[0-9]{3}',
                ['pattern' => '[a-z]+'],
                '[0-9]{3}',
                " pattern='[0-9]{3}'",
                "Should return new 'pattern' after replacing the existing 'pattern' attribute.",
            ],
            'string' => [
                '[0-9]+',
                [],
                '[0-9]+',
                " pattern='[0-9]+'",
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                " pattern='[a-zA-Z]*'",
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['pattern' => '[0-9]+'],
                null,
                '',
                "Should unset the 'pattern' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
