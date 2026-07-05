<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\CanBeHiddenTest} test cases.
 */
final class HiddenProvider
{
    /**
     * @phpstan-return array<string, array{bool|null, mixed[], bool|null, string, string}>
     */
    public static function values(): array
    {
        return [
            'boolean false' => [
                false,
                [],
                false,
                '',
                'Should return the attribute value after setting it.',
            ],
            'boolean true' => [
                true,
                [],
                true,
                ' hidden',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                null,
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing false' => [
                false,
                ['hidden' => true],
                false,
                '',
                "Should return 'false' when replacing existing 'hidden' attribute with 'false'.",
            ],
            'replace existing true' => [
                true,
                ['hidden' => false],
                true,
                ' hidden',
                "Should return 'true' when replacing existing 'hidden' attribute with 'true'.",
            ],
            'unset with null' => [
                null,
                ['hidden' => true],
                null,
                '',
                "Should unset the 'hidden' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
