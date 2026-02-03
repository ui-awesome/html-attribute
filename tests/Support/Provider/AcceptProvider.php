<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use Stringable;
use UIAwesome\Html\Attribute\Tests\Support\Stub\Values\{Backed, Unit};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasAcceptTest} test cases.
 *
 * Provides representative input/output pairs for the `accept` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class AcceptProvider
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
                return 'image/*';
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
                ' accept="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' accept="value"',
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
                'image/*',
                ['accept' => '.pdf'],
                'image/*',
                ' accept="image/*"',
                "Should return new 'accept' after replacing the existing 'accept' attribute.",
            ],
            'string' => [
                '.pdf',
                [],
                '.pdf',
                ' accept=".pdf"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' accept="image/*"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['accept' => 'image/*'],
                '',
                '',
                "Should unset the 'accept' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
