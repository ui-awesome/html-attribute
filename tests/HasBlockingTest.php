<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use BackedEnum;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasBlocking;
use UIAwesome\Html\Attribute\Tests\Provider\BlockingProvider;
use UIAwesome\Html\Attribute\Values\{Blocking, ElementAttribute};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasBlocking} trait managing the `blocking` HTML attribute.
 *
 * {@see BlockingProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasBlockingTest extends TestCase
{
    public function testReturnEmptyWhenBlockingAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasBlocking;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingBlockingAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasBlocking;
        };

        self::assertNotSame(
            $instance,
            $instance->blocking(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(BlockingProvider::class, 'values')]
    public function testSetBlockingAttributeValue(
        string|UnitEnum|null $blocking,
        array $attributes,
        string|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasBlocking;
        };

        $instance = $instance->attributes($attributes)->blocking($blocking);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::BLOCKING),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingBlockingValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasBlocking;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                ElementAttribute::BLOCKING->value,
                implode("', '", array_map(static fn(BackedEnum $case): string => $case->value, Blocking::cases())),
            ),
        );

        $instance->blocking('invalid-value');
    }
}
