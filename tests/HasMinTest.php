<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasMin;
use UIAwesome\Html\Attribute\Tests\Support\Provider\MinProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see HasMin} trait managing the `min` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `min` attribute is not provided.
 * - Sets the `min` HTML attribute and renders the expected output.
 *
 * {@see MinProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasMinTest extends TestCase
{
    public function testReturnEmptyWhenMinAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMin;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMinAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMin;
        };

        self::assertNotSame(
            $instance,
            $instance->min(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(MinProvider::class, 'values')]
    public function testSetMinAttributeValue(
        float|int|string|null $min,
        array $attributes,
        float|int|string|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMin;
        };

        $instance = $instance->attributes($attributes)->min($min);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::MIN, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
