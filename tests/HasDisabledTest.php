<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasDisabled;
use UIAwesome\Html\Attribute\Tests\Support\Provider\DisabledProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see HasDisabled} trait managing the `disabled` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `disabled` attribute is not provided.
 * - Sets the `disabled` HTML attribute and renders the expected output.
 *
 * {@see DisabledProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasDisabledTest extends TestCase
{
    public function testReturnEmptyWhenDisabledAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDisabled;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingDisabledAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDisabled;
        };

        self::assertNotSame(
            $instance,
            $instance->disabled(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DisabledProvider::class, 'values')]
    public function testSetDisabledAttributeValue(
        bool|null $disabled,
        array $attributes,
        bool|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasDisabled;
        };

        $instance = $instance->attributes($attributes)->disabled($disabled);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::DISABLED, null),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
