<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use Stringable;
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
        return [
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
