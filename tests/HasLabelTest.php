<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasLabel;
use UIAwesome\Html\Attribute\Tests\Provider\LabelProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, ElementAttribute};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasLabel} trait managing the `label` HTML attribute.
 *
 * {@see LabelProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasLabelTest extends TestCase
{
    public function testReturnEmptyWhenLabelAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLabel;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingLabelAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLabel;
        };

        self::assertNotSame(
            $instance,
            $instance->label('Group label'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(LabelProvider::class, 'values')]
    public function testSetLabelAttributeValue(
        string|Stringable|UnitEnum|null $label,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasLabel;
        };

        $instance = $instance->attributes($attributes)->label($label);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::LABEL),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
