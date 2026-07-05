<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasName;
use UIAwesome\Html\Attribute\Tests\Provider\NameProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, ElementAttribute};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasName} trait managing the `name` HTML attribute.
 *
 * {@see NameProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasNameTest extends TestCase
{
    public function testReturnEmptyWhenNameAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasName;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingNameAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasName;
        };

        self::assertNotSame(
            $instance,
            $instance->name(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(NameProvider::class, 'values')]
    public function testSetNameAttributeValue(
        string|Stringable|UnitEnum|null $name,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasName;
        };

        $instance = $instance->attributes($attributes)->name($name);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::NAME),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
