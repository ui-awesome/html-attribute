<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Element\HasHeight;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Element\HeightProvider;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Test suite for {@see HasHeight} trait functionality and behavior.
 *
 * Validates the management of the HTML `height` attribute according to the HTML Living Standard specification.
 *
 * Ensures correct handling, immutability, and validation of the `height` attribute in tag rendering, supporting string
 * and `null` for dynamic assignment.
 *
 * Test coverage:
 * - Accurate rendering of attributes with the `height` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `height` attribute.
 * - Proper assignment, overriding, and validation of `height` value.
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
        string|null $height,
        array $attributes,
        string $expectedValue,
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
            $instance->getAttribute(ElementAttribute::HEIGHT->value, null),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
