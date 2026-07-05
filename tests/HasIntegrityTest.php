<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasIntegrity;
use UIAwesome\Html\Attribute\Tests\Provider\IntegrityProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasIntegrity} trait managing the `integrity` HTML attribute.
 *
 * {@see IntegrityProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasIntegrityTest extends TestCase
{
    public function testReturnEmptyWhenIntegrityAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasIntegrity;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingIntegrityAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasIntegrity;
        };

        self::assertNotSame(
            $instance,
            $instance->integrity(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(IntegrityProvider::class, 'values')]
    public function testSetIntegrityAttributeValue(
        string|Stringable|UnitEnum|null $integrity,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasIntegrity;
        };

        $instance = $instance->attributes($attributes)->integrity($integrity);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::INTEGRITY),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
