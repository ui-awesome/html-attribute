<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Element\HasHeight;
use UIAwesome\Html\Attribute\Tests\Provider\Element\HeightProvider;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasHeight} trait managing the `height` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `height` attribute is not provided.
 * - Sets the `height` HTML attribute and renders the expected output.
 *
 * {@see HeightProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('element')]
final class HasHeightTest extends TestCase
{
    public function testReturnEmptyWhenHeightAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHeight;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingHeightAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHeight;
        };

        self::assertNotSame(
            $instance,
            $instance->height(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(HeightProvider::class, 'values')]
    public function testSetHeightAttributeValue(
        string|Stringable|UnitEnum|null $height,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasHeight;
        };

        $instance = $instance->attributes($attributes)->height($height);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::HEIGHT, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
