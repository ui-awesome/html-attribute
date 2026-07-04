<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasSrc;
use UIAwesome\Html\Attribute\Tests\Provider\SrcProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasSrc} trait managing the `src` HTML attribute.
 *
 * {@see SrcProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasSrcTest extends TestCase
{
    public function testReturnEmptyWhenSrcAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSrc;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingSrcAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSrc;
        };

        self::assertNotSame(
            $instance,
            $instance->src(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(SrcProvider::class, 'values')]
    public function testSetSrcAttributeValue(
        string|Stringable|UnitEnum|null $src,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasSrc;
        };

        $instance = $instance->attributes($attributes)->src($src);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::SRC),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
