<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Provider\Global;

/**
 * Data provider for {@see \UIAwesome\Html\Attribute\Tests\Global\CanBeAutofocusTest} test cases.
 */
final class AutofocusProvider
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
                ' autofocus',
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
                ['autofocus' => true],
                false,
                '',
                "Should return 'false' when replacing existing 'autofocus' attribute with 'false'.",
            ],
            'replace existing true' => [
                true,
                ['autofocus' => false],
                true,
                ' autofocus',
                "Should return 'true' when replacing existing 'autofocus' attribute with 'true'.",
            ],
            'unset with null' => [
                null,
                ['autofocus' => true],
                null,
                '',
                "Should unset the 'autofocus' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
