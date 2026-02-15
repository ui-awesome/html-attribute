<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Element\HasSrcset;
use UIAwesome\Html\Attribute\Tests\Provider\Element\SrcsetProvider;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasSrcset} trait managing the `srcset` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `srcset` attribute is not provided.
 * - Sets the `srcset` HTML attribute and renders the expected output.
 *
 * {@see SrcsetProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('element')]
final class HasSrcsetTest extends TestCase
{
    public function testReturnEmptyWhenSrcsetAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSrcset;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingSrcsetAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSrcset;
        };

        self::assertNotSame(
            $instance,
            $instance->srcset(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(SrcsetProvider::class, 'values')]
    public function testSetSrcsetAttributeValue(
        string|Stringable|UnitEnum|null $srcset,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasSrcset;
        };

        $instance = $instance->attributes($attributes)->srcset($srcset);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::SRCSET, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
