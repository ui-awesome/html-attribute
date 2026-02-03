<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Element\HasWidth;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Element\WidthProvider;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasWidth} trait managing the `width` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `width` attribute is not provided.
 * - Sets the `width` HTML attribute and renders the expected output.
 *
 * {@see WidthProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('element')]
final class HasWidthTest extends TestCase
{
    public function testReturnEmptyWhenWidthAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasWidth;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingWidthAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasWidth;
        };

        self::assertNotSame(
            $instance,
            $instance->width(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(WidthProvider::class, 'values')]
    public function testSetWidthAttributeValue(
        string|Stringable|UnitEnum|null $width,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasWidth;
        };

        $instance = $instance->attributes($attributes)->width($width);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::WIDTH, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
