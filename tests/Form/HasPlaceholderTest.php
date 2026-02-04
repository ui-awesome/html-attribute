<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Form;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Form\HasPlaceholder;
use UIAwesome\Html\Attribute\Tests\Provider\Form\PlaceholderProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasPlaceholder} trait managing the `placeholder` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `placeholder` attribute is not provided.
 * - Sets the `placeholder` HTML attribute and renders the expected output.
 *
 * {@see PlaceholderProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasPlaceholderTest extends TestCase
{
    public function testReturnEmptyWhenPlaceholderAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPlaceholder;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingPlaceholderAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPlaceholder;
        };

        self::assertNotSame(
            $instance,
            $instance->placeholder(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(PlaceholderProvider::class, 'values')]
    public function testSetPlaceholderAttributeValue(
        string|Stringable|UnitEnum|null $placeholder,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasPlaceholder;
        };

        $instance = $instance->attributes($attributes)->placeholder($placeholder);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::PLACEHOLDER, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
