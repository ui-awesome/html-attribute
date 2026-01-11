<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasId;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Global\IdProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Test suite for {@see HasId} trait functionality and behavior.
 *
 * Validates the management of the global HTML `id` attribute according to the HTML Living Standard specification.
 *
 * Ensures correct handling, immutability, and validation of the `id` attribute in tag rendering, supporting both string
 * and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `id` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `id` attribute.
 * - Proper assignment and overriding of `id` value.
 *
 * {@see IdProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasIdTest extends TestCase
{
    public function testReturnEmptyWhenIdAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasId;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingIdAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasId;
        };

        self::assertNotSame(
            $instance,
            $instance->id(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(IdProvider::class, 'values')]
    public function testSetIdAttributeValue(
        string|null $id,
        array $attributes,
        string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasId;
        };

        $instance = $instance->attributes($attributes)->id($id);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::ID, null),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
