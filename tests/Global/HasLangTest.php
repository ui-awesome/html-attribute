<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasLang;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Global\LangProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Language};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Test suite for {@see HasLang} trait functionality and behavior.
 *
 * Validates the management of the global HTML `lang` attribute according to the HTML Living Standard specification.
 *
 * Ensures correct handling, immutability, and validation of the `lang` attribute in tag rendering, supporting string,
 * UnitEnum, and `null` for dynamic language assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `lang` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `lang` attribute.
 * - Proper assignment and overriding of `lang` value.
 *
 * {@see LangProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attributes')]
final class HasLangTest extends TestCase
{
    public function testReturnEmptyWhenLangAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLang;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingLangAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLang;
        };

        self::assertNotSame(
            $instance,
            $instance->lang(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(LangProvider::class, 'values')]
    public function testSetLangAttributeValue(
        string|UnitEnum|null $lang,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasLang;
        };

        $instance = $instance->attributes($attributes)->lang($lang);

        self::assertSame(
            $expectedValue,
            $instance->getAttributes()[GlobalAttribute::LANG->value] ?? '',
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidLangValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLang;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                'lang',
                implode('\', \'', Enum::normalizeArray(Language::cases())),
            ),
        );

        $instance->lang('invalid-value');
    }
}
