<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Exception\Message;
use UIAwesome\Html\Attribute\Global\HasTabindex;
use UIAwesome\Html\Attribute\Tests\Provider\Global\TabIndexProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see HasTabindex} trait managing the `tabindex` global HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `tabindex` attribute is not provided.
 * - Sets the `tabindex` global HTML attribute and renders the expected output.
 * - Verifies invalid `tabindex` values throw an `InvalidArgumentException`.
 *
 * {@see TabIndexProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasTabIndexTest extends TestCase
{
    public function testReturnEmptyWhenTabIndexAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTabindex;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingTabIndexAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTabindex;
        };

        self::assertNotSame(
            $instance,
            $instance->tabIndex(1),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param int|string|null $tabIndex
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(TabIndexProvider::class, 'values')]
    public function testSetTabIndexAttributeValue(
        int|string|null $tabIndex,
        array $attributes,
        int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasTabindex;
        };

        $instance = $instance->attributes($attributes)->tabIndex($tabIndex);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::TABINDEX, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    #[DataProviderExternal(TabIndexProvider::class, 'invalidValues')]
    public function testThrowInvalidArgumentExceptionForSettingTabIndexAttribute(int|string $tabIndex): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTabindex;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::ATTRIBUTE_INVALID_VALUE->getMessage($tabIndex, GlobalAttribute::TABINDEX->value, 'value >= -1'),
        );

        $instance->tabIndex($tabIndex);
    }
}
