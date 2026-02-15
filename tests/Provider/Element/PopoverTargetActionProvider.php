<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Element;

use PHPForge\Support\EnumDataProvider;
use Stringable;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, PopoverTargetAction};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Element\HasPopoverTargetActionTest} test cases.
 *
 * Provides representative input/output pairs for the `popovertargetaction` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PopoverTargetActionProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{string|Stringable|UnitEnum|null, mixed[], string|Stringable|UnitEnum|null, string, string},
     * >
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(
            PopoverTargetAction::class,
            ElementAttribute::POPOVERTARGETACTION,
        );

        $stringable = new class implements Stringable {
            public function __toString(): string
            {
                return 'show';
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
                'show',
                ['popovertargetaction' => 'hide'],
                'show',
                ' popovertargetaction="show"',
                "Should return new 'popovertargetaction' after replacing the existing 'popovertargetaction' attribute.",
            ],
            'string' => [
                'toggle',
                [],
                'toggle',
                ' popovertargetaction="toggle"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' popovertargetaction="show"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['popovertargetaction' => 'toggle'],
                null,
                '',
                "Should unset the 'popovertargetaction' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$enumCases, ...$staticCases];
    }
}
