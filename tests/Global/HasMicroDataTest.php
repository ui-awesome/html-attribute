<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Global\HasMicroData;
use UIAwesome\Html\Attribute\Tests\Provider\Global\{
    ItemIdProvider,
    ItemPropProvider,
    ItemRefProvider,
    ItemScopeProvider,
    ItemTypeProvider,
};
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasMicroData} trait managing global microdata HTML attributes.
 *
 * {@see ItemIdProvider}, {@see ItemPropProvider}, {@see ItemRefProvider},
 * {@see ItemScopeProvider}, {@see ItemTypeProvider} for test case data providers.
 */
#[Group('global')]
final class HasMicroDataTest extends TestCase
{
    public function testReturnEmptyWhenMicroDataNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMicroData;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingItemIdAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMicroData;
        };

        self::assertNotSame(
            $instance,
            $instance->itemId(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testReturnNewInstanceWhenSettingItemPropAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMicroData;
        };

        self::assertNotSame(
            $instance,
            $instance->itemProp(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testReturnNewInstanceWhenSettingItemRefAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMicroData;
        };

        self::assertNotSame(
            $instance,
            $instance->itemRef(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testReturnNewInstanceWhenSettingItemScopeAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMicroData;
        };

        self::assertNotSame(
            $instance,
            $instance->itemScope(false),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testReturnNewInstanceWhenSettingItemTypeAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMicroData;
        };

        self::assertNotSame(
            $instance,
            $instance->itemType(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ItemIdProvider::class, 'values')]
    public function testSetItemIdAttributeValue(
        string|Stringable|UnitEnum|null $itemId,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMicroData;
        };

        $instance = $instance->attributes($attributes)->itemId($itemId);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::ITEMID),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ItemPropProvider::class, 'values')]
    public function testSetItemPropAttributeValue(
        string|Stringable|UnitEnum|null $itemProp,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMicroData;
        };

        $instance = $instance->attributes($attributes)->itemProp($itemProp);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::ITEMPROP),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ItemRefProvider::class, 'values')]
    public function testSetItemRefAttributeValue(
        string|Stringable|UnitEnum|null $itemRef,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMicroData;
        };

        $instance = $instance->attributes($attributes)->itemRef($itemRef);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::ITEMREF),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ItemScopeProvider::class, 'values')]
    public function testSetItemScopeAttributeValue(
        bool|null $itemScope,
        array $attributes,
        bool|string|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMicroData;
        };

        $instance = $instance->attributes($attributes)->itemScope($itemScope);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::ITEMSCOPE),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ItemTypeProvider::class, 'values')]
    public function testSetItemTypeAttributeValue(
        string|Stringable|UnitEnum|null $itemType,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMicroData;
        };

        $instance = $instance->attributes($attributes)->itemType($itemType);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::ITEMTYPE),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
