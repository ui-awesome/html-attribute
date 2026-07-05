<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use BackedEnum;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Global\HasLang;
use UIAwesome\Html\Attribute\Tests\Provider\Global\LangProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Language};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasLang} trait managing the `lang` global HTML attribute.
 *
 * {@see LangProvider} for test case data providers.
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
        string|Stringable|UnitEnum|null $expectedValue,
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
            $instance->getAttribute(GlobalAttribute::LANG),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingLang(): void
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
                implode("', '", array_map(static fn(BackedEnum $case): string => $case->value, Language::cases())),
            ),
        );

        $instance->lang('invalid-value');
    }
}
