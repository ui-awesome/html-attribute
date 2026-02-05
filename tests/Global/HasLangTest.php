<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Global\HasLang;
use UIAwesome\Html\Attribute\Tests\Provider\Global\LangProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Language};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasLang} trait managing the `lang` global HTML attribute.
 *
 * Verifies rendered output, immutability, attribute override, and validation behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `lang` attribute is not provided.
 * - Sets the `lang` global HTML attribute and renders the expected output.
 * - Throws an exception when the `lang` attribute value is invalid.
 *
 * {@see LangProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
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
        string|Stringable|UnitEnum|null $lang,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
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
            $instance->getAttribute(GlobalAttribute::LANG, ''),
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
