<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Element\HasAlt;
use UIAwesome\Html\Attribute\Tests\Provider\Element\AltProvider;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasAlt} trait managing the `alt` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `alt` attribute is not provided.
 * - Sets the `alt` HTML attribute and renders the expected output.
 *
 * {@see AltProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('element')]
final class HasAltTest extends TestCase
{
    public function testReturnEmptyWhenAltAttributeNotSet(): void
    {
        $instance = new class {
            use HasAlt;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingAltAttribute(): void
    {
        $instance = new class {
            use HasAlt;
            use HasAttributes;
        };

        self::assertNotSame(
            $instance,
            $instance->alt(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AltProvider::class, 'values')]
    public function testSetAltAttributeValue(
        string|Stringable|UnitEnum|null $alt,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAlt;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->alt($alt);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::ALT, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
