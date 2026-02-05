<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasSizes;
use UIAwesome\Html\Attribute\Tests\Provider\SizesProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasSizes} trait managing the `sizes` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `sizes` attribute is not provided.
 * - Sets the `sizes` HTML attribute and renders the expected output.
 *
 * {@see SizesProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasSizesTest extends TestCase
{
    public function testReturnEmptyWhenSizesAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSizes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingSizesAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSizes;
        };

        self::assertNotSame(
            $instance,
            $instance->sizes(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(SizesProvider::class, 'values')]
    public function testSetSizesAttributeValue(
        string|Stringable|UnitEnum|null $sizes,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasSizes;
        };

        $instance = $instance->attributes($attributes)->sizes($sizes);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::SIZES, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
