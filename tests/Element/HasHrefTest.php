<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Element\HasHref;
use UIAwesome\Html\Attribute\Tests\Provider\Element\HrefProvider;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasHref} trait managing the `href` HTML and SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `href` attribute is not provided.
 * - Sets the `href` HTML and SVG attribute and renders the expected output.
 *
 * {@see HrefProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('element')]
final class HasHrefTest extends TestCase
{
    public function testReturnEmptyWhenHrefAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHref;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingHrefAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHref;
        };

        self::assertNotSame(
            $instance,
            $instance->href('https://example.com'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(HrefProvider::class, 'values')]
    public function testSetHrefAttributeValue(
        string|Stringable|UnitEnum|null $href,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasHref;
        };

        $instance = $instance->attributes($attributes)->href($href);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::HREF, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
