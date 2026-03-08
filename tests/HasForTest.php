<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasFor;
use UIAwesome\Html\Attribute\Tests\Provider\ForProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasFor} trait managing the `for` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `for` attribute is not provided.
 * - Sets the `for` HTML attribute and renders the expected output.
 *
 * {@see ForProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasForTest extends TestCase
{
    public function testReturnEmptyWhenForAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFor;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingForAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFor;
        };

        self::assertNotSame(
            $instance,
            $instance->for(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ForProvider::class, 'values')]
    public function testSetForAttributeValue(
        string|Stringable|UnitEnum|null $for,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFor;
        };

        $instance = $instance->attributes($attributes)->for($for);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::FOR, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
