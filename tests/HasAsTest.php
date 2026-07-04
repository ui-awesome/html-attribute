<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use BackedEnum;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasAs;
use UIAwesome\Html\Attribute\Tests\Provider\AsProvider;
use UIAwesome\Html\Attribute\Values\{AsValue, ElementAttribute};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasAs} trait managing the `as` HTML attribute.
 *
 * {@see AsProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasAsTest extends TestCase
{
    public function testReturnEmptyWhenAsAttributeNotSet(): void
    {
        $instance = new class {
            use HasAs;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingAsAttribute(): void
    {
        $instance = new class {
            use HasAs;
            use HasAttributes;
        };

        self::assertNotSame(
            $instance,
            $instance->as(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AsProvider::class, 'values')]
    public function testSetAsAttributeValue(
        string|Stringable|UnitEnum|null $as,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAs;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->as($as);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::AS),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingAsValue(): void
    {
        $instance = new class {
            use HasAs;
            use HasAttributes;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                ElementAttribute::AS->value,
                implode("', '", array_map(static fn(BackedEnum $case): string => $case->value, AsValue::cases())),
            ),
        );

        $instance->as('invalid-value');
    }
}
