<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use Stringable;
use UIAwesome\Html\Attribute\Tests\Support\Stub\Values\Status;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasTypeTest} test cases.
 *
 * Provides representative input/output pairs for the `type` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class TypeProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum, string, string}
     * >
     */
    public static function values(): array
    {
        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'text/css';
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
            'enum' => [
                Status::ACTIVE,
                [],
                Status::ACTIVE,
                ' type="active"',
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
                'text/css',
                ['type' => 'text/plain'],
                'text/css',
                ' type="text/css"',
                "Should return new 'type' after replacing the existing 'type' attribute.",
            ],
            'string' => [
                'text/plain',
                [],
                'text/plain',
                ' type="text/plain"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' type="text/css"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['type' => 'text/css'],
                '',
                '',
                "Should unset the 'type' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
