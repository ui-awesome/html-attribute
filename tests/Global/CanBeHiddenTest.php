<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\CanBeHidden;
use UIAwesome\Html\Attribute\Tests\Provider\Global\HiddenProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see CanBeHidden} trait managing the `hidden` global HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `hidden` attribute is not provided.
 * - Sets the `hidden` global HTML attribute and renders the expected output.
 *
 * {@see HiddenProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
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
        bool|null $value,
        array $attributes,
        bool|null $expectedValue,
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
            $instance->getAttribute(GlobalAttribute::HIDDEN, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
