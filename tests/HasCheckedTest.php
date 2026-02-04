<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasChecked;
use UIAwesome\Html\Attribute\Tests\Support\Provider\CheckedProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see HasChecked} trait managing the `checked` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `checked` attribute is not provided.
 * - Sets the `checked` HTML attribute and renders the expected output.
 *
 * {@see CheckedProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasCheckedTest extends TestCase
{
    public function testReturnEmptyWhenCheckedAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasChecked;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingCheckedAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasChecked;
        };

        self::assertNotSame(
            $instance,
            $instance->checked(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(CheckedProvider::class, 'values')]
    public function testSetCheckedAttributeValue(
        bool|null $checked,
        array $attributes,
        bool|string $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasChecked;
        };

        $instance = $instance->attributes($attributes)->checked($checked);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::CHECKED, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
