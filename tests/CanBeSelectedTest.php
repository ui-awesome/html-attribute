<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\CanBeSelected;
use UIAwesome\Html\Attribute\Tests\Provider\SelectedProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see CanBeSelected} trait managing the `selected` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `selected` attribute is not provided.
 * - Sets the `selected` HTML attribute and renders the expected output.
 *
 * {@see SelectedProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class CanBeSelectedTest extends TestCase
{
    public function testReturnEmptyWhenSelectedAttributeNotSet(): void
    {
        $instance = new class {
            use CanBeSelected;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingSelectedAttribute(): void
    {
        $instance = new class {
            use CanBeSelected;
            use HasAttributes;
        };

        self::assertNotSame(
            $instance,
            $instance->selected(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(SelectedProvider::class, 'values')]
    public function testSetSelectedAttributeValue(
        bool|null $selected,
        array $attributes,
        bool|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use CanBeSelected;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->selected($selected);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::SELECTED, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
