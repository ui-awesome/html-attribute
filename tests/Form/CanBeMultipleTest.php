<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Form;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Form\CanBeMultiple;
use UIAwesome\Html\Attribute\Tests\Provider\Form\MultipleProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see CanBeMultiple} trait managing the `multiple` HTML attribute.
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
final class CanBeMultipleTest extends TestCase
{
    public function testReturnEmptyWhenMultipleAttributeNotSet(): void
    {
        $instance = new class {
            use CanBeMultiple;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMultipleAttribute(): void
    {
        $instance = new class {
            use CanBeMultiple;
            use HasAttributes;
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
        bool|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use CanBeMultiple;
            use HasAttributes;
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
