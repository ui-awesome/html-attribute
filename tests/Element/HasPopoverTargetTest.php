<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Element\HasPopoverTarget;
use UIAwesome\Html\Attribute\Tests\Provider\Element\PopoverTargetProvider;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasPopoverTarget} trait managing the `popovertarget` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `popovertarget` attribute is not provided.
 * - Sets the `popovertarget` HTML attribute and renders the expected output.
 *
 * {@see PopoverTargetProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasPopoverTargetTest extends TestCase
{
    public function testReturnEmptyWhenPopoverTargetAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPopoverTarget;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingPopoverTargetAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPopoverTarget;
        };

        self::assertNotSame(
            $instance,
            $instance->popoverTarget(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(PopoverTargetProvider::class, 'values')]
    public function testSetPopoverTargetAttributeValue(
        string|Stringable|UnitEnum|null $popoverTarget,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasPopoverTarget;
        };

        $instance = $instance->attributes($attributes)->popoverTarget($popoverTarget);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::POPOVERTARGET, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
