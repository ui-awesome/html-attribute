<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasRequired;
use UIAwesome\Html\Attribute\Tests\Support\Provider\RequiredProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see HasRequired} trait managing the `required` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `required` attribute is not provided.
 * - Sets the `required` HTML attribute and renders the expected output.
 *
 * {@see RequiredProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasRequiredTest extends TestCase
{
    public function testReturnEmptyWhenRequiredAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRequired;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingRequiredAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRequired;
        };

        self::assertNotSame(
            $instance,
            $instance->required(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RequiredProvider::class, 'values')]
    public function testSetRequiredAttributeValue(
        bool|null $required,
        array $attributes,
        bool|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasRequired;
        };

        $instance = $instance->attributes($attributes)->required($required);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::REQUIRED, null),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
