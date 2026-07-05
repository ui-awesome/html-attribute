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
 * {@see ForProvider} for test case data providers.
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
            $instance->getAttribute(Attribute::FOR),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
