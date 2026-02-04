<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasMultiple;
use UIAwesome\Html\Attribute\Tests\Support\Provider\MultipleProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see HasMultiple} trait managing the `multiple` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `multiple` attribute is not provided.
 * - Sets the `multiple` HTML attribute and renders the expected output.
 *
 * {@see MultipleProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasMultipleTest extends TestCase
{
    public function testReturnEmptyWhenMultipleAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMultiple;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMultipleAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMultiple;
        };

        self::assertNotSame(
            $instance,
            $instance->multiple(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(MultipleProvider::class, 'values')]
    public function testSetMultipleAttributeValue(
        bool|null $multiple,
        array $attributes,
        bool|string $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMultiple;
        };

        $instance = $instance->attributes($attributes)->multiple($multiple);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::MULTIPLE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
