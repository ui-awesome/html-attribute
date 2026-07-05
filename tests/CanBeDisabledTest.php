<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\CanBeDisabled;
use UIAwesome\Html\Attribute\Tests\Provider\DisabledProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see CanBeDisabled} trait managing the `disabled` HTML attribute.
 *
 * {@see DisabledProvider} for test case data providers.
 */
#[Group('attribute')]
final class CanBeDisabledTest extends TestCase
{
    public function testReturnEmptyWhenDisabledAttributeNotSet(): void
    {
        $instance = new class {
            use CanBeDisabled;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingDisabledAttribute(): void
    {
        $instance = new class {
            use CanBeDisabled;
            use HasAttributes;
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
            use CanBeDisabled;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->disabled($disabled);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::DISABLED),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
