<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasValue;
use UIAwesome\Html\Attribute\Tests\Provider\ValueProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, ElementAttribute};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasValue} trait managing the `value` HTML attribute.
 *
 * {@see ValueProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasValueTest extends TestCase
{
    public function testReturnEmptyWhenValueAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasValue;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingValueAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasValue;
        };

        self::assertNotSame(
            $instance,
            $instance->value('test'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ValueProvider::class, 'values')]
    public function testSetValueAttributeValue(
        bool|float|int|string|Stringable|UnitEnum|null $value,
        array $attributes,
        bool|float|int|string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasValue;
        };

        $instance = $instance->attributes($attributes)->value($value);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::VALUE),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
