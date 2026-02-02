<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasValue;
use UIAwesome\Html\Attribute\Tests\Support\Provider\ValueProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasValue} trait managing the `value` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior for the `value` attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `value` attribute is not provided.
 * - Sets the `value` HTML attribute with string, int, and null values and renders the expected output.
 *
 * {@see ValueProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasValueTest extends TestCase
{
    public function testReturnEmptyWhenValueAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasValue;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingValueAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasValue;
        };

        self::assertNotSame(
            $instance,
            $instance->value('test'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ValueProvider::class, 'values')]
    public function testSetValueAttributeValue(
        float|int|string|UnitEnum|null $value,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasValue;
        };

        $instance = $instance->attributes($attributes)->value($value);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::VALUE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
