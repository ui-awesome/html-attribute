<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use Stringable;
use UIAwesome\Html\Attribute\Tests\Support\Stub\Values\Status;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasFormTest} test cases.
 *
 * Provides representative input/output pairs for the `form` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FormProvider
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
                return 'form-id';
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
                ' form="active"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'string' => [
                'myForm',
                [],
                'myForm',
                ' form="myForm"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' form="form-id"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'replace existing' => [
                'myForm',
                ['form' => 'oldForm'],
                'myForm',
                ' form="myForm"',
                "Should return new 'form' after replacing the existing 'form' attribute.",
            ],
            'unset with null' => [
                null,
                ['form' => 'myForm'],
                '',
                '',
                "Should unset the 'form' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
