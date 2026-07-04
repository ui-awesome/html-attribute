<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use BackedEnum;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasDraggable;
use UIAwesome\Html\Attribute\Tests\Provider\Global\DraggableProvider;
use UIAwesome\Html\Attribute\Values\{Draggable, GlobalAttribute};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasDraggable} trait managing the `draggable` global HTML attribute.
 *
 * {@see DraggableProvider} for test case data providers.
 */
#[Group('global')]
final class HasDraggableTest extends TestCase
{
    public function testReturnEmptyWhenDraggableAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDraggable;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingDraggableAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDraggable;
        };

        self::assertNotSame(
            $instance,
            $instance->draggable(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DraggableProvider::class, 'values')]
    public function testSetDraggableAttributeValue(
        bool|string|UnitEnum|null $draggable,
        array $attributes,
        string|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasDraggable;
        };

        $instance = $instance->attributes($attributes)->draggable($draggable);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::DRAGGABLE),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingDraggable(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDraggable;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                GlobalAttribute::DRAGGABLE->value,
                implode("', '", array_map(static fn(BackedEnum $case): string => $case->value, Draggable::cases())),
            ),
        );

        $instance->draggable('invalid-value');
    }
}
