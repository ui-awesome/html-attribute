<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\CanBeHidden;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Global\HiddenProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Test suite for {@see CanBeHidden} trait functionality and behavior.
 *
 * Validates the management of the global HTML `hidden` attribute according to the HTML Living Standard specification.
 *
 * Ensures correct handling, immutability, and validation of the `hidden` attribute in tag rendering, supporting bool
 * for dynamic hidden state assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `hidden` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `hidden` attribute.
 * - Proper assignment and overriding of `hidden` value.
 *
 * {@see HiddenProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class CanBeHiddenTest extends TestCase
{
    public function testReturnEmptyWhenHiddenAttributeNotSet(): void
    {
        $instance = new class {
            use CanBeHidden;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingHiddenAttribute(): void
    {
        $instance = new class {
            use CanBeHidden;
            use HasAttributes;
        };

        self::assertNotSame(
            $instance,
            $instance->hidden(true),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(HiddenProvider::class, 'values')]
    public function testSetHiddenAttributeValue(
        bool $value,
        array $attributes,
        bool|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use CanBeHidden;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->hidden($value);

        self::assertSame(
            $expectedValue,
            $instance->getAttributes()[GlobalAttribute::HIDDEN->value] ?? '',
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
