<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasPopover;
use UIAwesome\Html\Attribute\Tests\Provider\Global\PopoverProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Popover};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasPopover} trait managing the `popover` global HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `popover` attribute is not provided.
 * - Sets the `popover` global HTML attribute and renders the expected output.
 * - Verifies invalid `popover` values throw an `InvalidArgumentException`.
 *
 * {@see PopoverProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasPopoverTest extends TestCase
{
    public function testReturnEmptyWhenPopoverAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPopover;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingPopoverAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPopover;
        };

        self::assertNotSame(
            $instance,
            $instance->popover(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(PopoverProvider::class, 'values')]
    public function testSetPopoverAttributeValue(
        string|UnitEnum|null $popover,
        array $attributes,
        string|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasPopover;
        };

        $instance = $instance->attributes($attributes)->popover($popover);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::POPOVER, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingPopoverValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPopover;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                GlobalAttribute::POPOVER->value,
                implode('\', \'', Enum::normalizeArray(Popover::cases())),
            ),
        );

        $instance->popover('invalid-value');
    }
}
