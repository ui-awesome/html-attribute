<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasPing;
use UIAwesome\Html\Attribute\Tests\Provider\PingProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, ElementAttribute};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasPing} trait managing the `ping` HTML attribute.
 *
 * {@see PingProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasPingTest extends TestCase
{
    public function testReturnEmptyWhenPingAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPing;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingPingAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPing;
        };

        self::assertNotSame(
            $instance,
            $instance->ping('https://example.com/track'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(PingProvider::class, 'values')]
    public function testSetPingAttributeValue(
        string|Stringable|UnitEnum|null $ping,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasPing;
        };

        $instance = $instance->attributes($attributes)->ping($ping);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::PING),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
