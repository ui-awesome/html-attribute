<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider;

use PHPForge\Support\Stub\{BackedString, Unit};
use Stringable;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasLabelTest} test cases.
 */
final class LabelProvider
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
                return 'group-label';
            }
        };

        return [
            'enum backed string' => [
                BackedString::VALUE,
                [],
                BackedString::VALUE,
                ' label="value"',
                'Should return the attribute value after setting it.',
            ],
            'enum unit' => [
                Unit::value,
                [],
                Unit::value,
                ' label="value"',
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
                'New Label',
                ['label' => 'Old Label'],
                'New Label',
                ' label="New Label"',
                "Should return new 'label' after replacing the existing 'label' attribute.",
            ],
            'string' => [
                'Group Label',
                [],
                'Group Label',
                ' label="Group Label"',
                'Should return the attribute value after setting it.',
            ],
            'stringable' => [
                $stringable,
                [],
                $stringable,
                ' label="group-label"',
                'Should return the attribute value after setting it with a Stringable instance.',
            ],
            'unset with null' => [
                null,
                ['label' => 'Group Label'],
                null,
                '',
                "Should unset the 'label' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
