<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Element;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasPopoverTargetTest} test cases.
 *
 * Provides representative input/output pairs for the `popovertarget` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PopoverTargetProvider
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
                return 'popover-id';
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
            'enum backed string' => [
                BackedString::VALUE,
                [],
                BackedString::VALUE,
                ' popovertarget="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' popovertarget="value"',
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
                'popover-id',
                ['popovertarget' => 'old-popover-id'],
                'popover-id',
                ' popovertarget="popover-id"',
                "Should return new 'popovertarget' after replacing the existing 'popovertarget' attribute.",
            ],
            'string' => [
                'popover-id',
                [],
                'popover-id',
                ' popovertarget="popover-id"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' popovertarget="popover-id"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['popovertarget' => 'popover-id'],
                '',
                '',
                "Should unset the 'popovertarget' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
