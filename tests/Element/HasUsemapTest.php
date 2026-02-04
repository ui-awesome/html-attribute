<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Element\HasUsemap;
use UIAwesome\Html\Attribute\Tests\Provider\Element\UsemapProvider;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasUsemap} trait managing the `usemap` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `usemap` attribute is not provided.
 * - Sets the `usemap` HTML attribute and renders the expected output.
 *
 * {@see UsemapProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('element')]
final class HasUsemapTest extends TestCase
{
    public function testReturnEmptyWhenUsemapAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasUsemap;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingUsemapAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasUsemap;
        };

        self::assertNotSame(
            $instance,
            $instance->usemap(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(UsemapProvider::class, 'values')]
    public function testSetUsemapAttributeValue(
        string|Stringable|UnitEnum|null $usemap,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasUsemap;
        };

        $instance = $instance->attributes($attributes)->usemap($usemap);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::USEMAP, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
