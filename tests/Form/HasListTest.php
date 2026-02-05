<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Form;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Form\HasList;
use UIAwesome\Html\Attribute\Tests\Provider\Form\ListProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasList} trait managing the `list` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `list` attribute is not provided.
 * - Sets the `list` HTML attribute and renders the expected output.
 *
 * {@see ListProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasListTest extends TestCase
{
    public function testReturnEmptyWhenListAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasList;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingListAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasList;
        };

        self::assertNotSame(
            $instance,
            $instance->list(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ListProvider::class, 'values')]
    public function testSetListAttributeValue(
        string|Stringable|UnitEnum|null $list,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasList;
        };

        $instance = $instance->attributes($attributes)->list($list);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::LIST, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
