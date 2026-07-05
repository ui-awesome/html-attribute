<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Global\HasStyle;
use UIAwesome\Html\Attribute\Tests\Provider\Global\StyleProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasStyle} trait managing the `style` global HTML attribute.
 *
 * {@see StyleProvider} for test case data providers.
 */
#[Group('global')]
final class HasStyleTest extends TestCase
{
    public function testReturnEmptyWhenStyleAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStyle;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStyleAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStyle;
        };

        self::assertNotSame(
            $instance,
            $instance->style(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[]|string|Stringable|UnitEnum|null $style
     * @phpstan-param mixed[] $attributes
     * @phpstan-param mixed[]|string|Stringable|UnitEnum $expectedValue
     */
    #[DataProviderExternal(StyleProvider::class, 'values')]
    public function testSetStyleAttributeValue(
        array|string|Stringable|UnitEnum|null $style,
        array $attributes,
        array|string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStyle;
        };

        $instance = $instance->attributes($attributes)->style($style);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::STYLE),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
