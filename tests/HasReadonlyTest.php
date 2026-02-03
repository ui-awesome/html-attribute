<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasReadonly;
use UIAwesome\Html\Attribute\Tests\Support\Provider\ReadonlyProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see HasReadonly} trait managing the `readonly` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `readonly` attribute is not provided.
 * - Sets the `readonly` HTML attribute and renders the expected output.
 *
 * {@see ReadonlyProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasReadonlyTest extends TestCase
{
    public function testReturnEmptyWhenReadonlyAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasReadonly;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingReadonlyAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasReadonly;
        };

        self::assertNotSame(
            $instance,
            $instance->readonly(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ReadonlyProvider::class, 'values')]
    public function testSetReadonlyAttributeValue(
        bool|null $readonly,
        array $attributes,
        bool|string|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasReadonly;
        };

        $instance = $instance->attributes($attributes)->readonly($readonly);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::READONLY, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
