<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasSize;
use UIAwesome\Html\Attribute\Tests\Support\Provider\SizeProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasSize} trait managing the `size` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `size` attribute is not provided.
 * - Sets the `size` HTML attribute and renders the expected output.
 *
 * {@see SizeProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasSizeTest extends TestCase
{
    public function testReturnEmptyWhenSizeAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSize;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingSizeAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSize;
        };

        self::assertNotSame(
            $instance,
            $instance->size(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(SizeProvider::class, 'values')]
    public function testSetSizeAttributeValue(
        int|string|Stringable|UnitEnum|null $size,
        array $attributes,
        int|string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasSize;
        };

        $instance = $instance->attributes($attributes)->size($size);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::SIZE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
