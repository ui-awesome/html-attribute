<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Form;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Form\HasMax;
use UIAwesome\Html\Attribute\Tests\Provider\Form\MaxProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasMax} trait managing the `max` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `max` attribute is not provided.
 * - Sets the `max` HTML attribute and renders the expected output.
 *
 * {@see MaxProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasMaxTest extends TestCase
{
    public function testReturnEmptyWhenMaxAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMax;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMaxAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMax;
        };

        self::assertNotSame(
            $instance,
            $instance->max(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(MaxProvider::class, 'values')]
    public function testSetMaxAttributeValue(
        float|int|string|Stringable|UnitEnum|null $max,
        array $attributes,
        float|int|string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMax;
        };

        $instance = $instance->attributes($attributes)->max($max);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::MAX, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
