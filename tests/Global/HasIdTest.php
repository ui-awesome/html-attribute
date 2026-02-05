<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Global\HasId;
use UIAwesome\Html\Attribute\Tests\Provider\Global\IdProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasId} trait managing the `id` global HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `id` attribute is not provided.
 * - Sets the `id` global HTML attribute and renders the expected output.
 *
 * {@see IdProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
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
        string|Stringable|UnitEnum|null $id,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
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
            $instance->getAttribute(GlobalAttribute::ID, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
