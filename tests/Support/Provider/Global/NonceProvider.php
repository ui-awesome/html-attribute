<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider\Global;

use Stringable;
use UIAwesome\Html\Attribute\Tests\Support\Stub\Values\Status;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\HasNonceTest} test cases.
 *
 * Provides representative input/output pairs for the `nonce` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class NonceProvider
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
                return 'nonce-value';
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
                ' nonce="active"',
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
                'nonce-2',
                ['nonce' => 'nonce-1'],
                'nonce-2',
                ' nonce="nonce-2"',
                "Should return new 'nonce' after replacing the existing 'nonce' attribute.",
            ],
            'string' => [
                'nonce-value',
                [],
                'nonce-value',
                ' nonce="nonce-value"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' nonce="nonce-value"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['nonce' => 'nonce-value'],
                '',
                '',
                "Should unset the 'nonce' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
