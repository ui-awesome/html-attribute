<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use BackedEnum;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasTranslate;
use UIAwesome\Html\Attribute\Tests\Provider\Global\TranslateProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Translate};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasTranslate} trait managing the `translate` global HTML attribute.
 *
 * {@see TranslateProvider} for test case data providers.
 */
#[Group('global')]
final class HasTranslateTest extends TestCase
{
    public function testReturnEmptyWhenTranslateAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTranslate;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingTranslateAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTranslate;
        };

        self::assertNotSame(
            $instance,
            $instance->translate(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(TranslateProvider::class, 'values')]
    public function testSetTranslateAttributeValue(
        bool|string|UnitEnum|null $translate,
        array $attributes,
        bool|string|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasTranslate;
        };

        $instance = $instance->attributes($attributes)->translate($translate);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::TRANSLATE),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingTranslate(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTranslate;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                GlobalAttribute::TRANSLATE->value,
                implode("', '", array_map(static fn(BackedEnum $case): string => $case->value, Translate::cases())),
            ),
        );

        $instance->translate('invalid-value');
    }
}
