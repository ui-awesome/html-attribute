<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Provider;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, Target};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\HasTargetTest} test cases.
 *
 * Provides representative input/output pairs for the `target` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class TargetProvider
{
    /**
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(Target::class, Attribute::TARGET);

        $staticCase = [
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
            'replace existing' => [
                '_blank',
                ['target' => '_self'],
                '_blank',
                ' target="_blank"',
                "Should return new 'target' after replacing the existing 'target' attribute.",
            ],
            'string _self' => [
                '_self',
                [],
                '_self',
                ' target="_self"',
                'Should return the attribute value after setting it to _self.',
            ],
            'string _blank' => [
                '_blank',
                [],
                '_blank',
                ' target="_blank"',
                'Should return the attribute value after setting it to _blank.',
            ],
            'string _parent' => [
                '_parent',
                [],
                '_parent',
                ' target="_parent"',
                'Should return the attribute value after setting it to _parent.',
            ],
            'string _top' => [
                '_top',
                [],
                '_top',
                ' target="_top"',
                'Should return the attribute value after setting it to _top.',
            ],
            'unset with null' => [
                null,
                ['target' => '_blank'],
                '',
                '',
                "Should unset the 'target' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCase, ...$enumCases];
    }
}
