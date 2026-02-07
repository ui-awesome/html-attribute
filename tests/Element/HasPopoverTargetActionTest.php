<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Element\HasPopoverTargetAction;
use UIAwesome\Html\Attribute\Tests\Provider\Element\PopoverTargetActionProvider;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, PopoverTargetAction};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasPopoverTargetAction} trait managing the `popovertargetaction` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `popovertargetaction` attribute is not provided.
 * - Sets the `popovertargetaction` HTML attribute and renders the expected output.
 * - Verifies invalid `popovertargetaction` values throw an `InvalidArgumentException`.
 *
 * {@see PopoverTargetActionProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasPopoverTargetActionTest extends TestCase
{
    public function testReturnEmptyWhenPopoverTargetActionAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPopoverTargetAction;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingPopoverTargetActionAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPopoverTargetAction;
        };

        self::assertNotSame(
            $instance,
            $instance->popoverTargetAction(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(PopoverTargetActionProvider::class, 'values')]
    public function testSetPopoverTargetActionAttributeValue(
        string|Stringable|UnitEnum|null $popoverTargetAction,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasPopoverTargetAction;
        };

        $instance = $instance->attributes($attributes)->popoverTargetAction($popoverTargetAction);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::POPOVERTARGETACTION, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingPopoverTargetActionValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPopoverTargetAction;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                ElementAttribute::POPOVERTARGETACTION->value,
                implode('\', \'', Enum::normalizeArray(PopoverTargetAction::cases())),
            ),
        );

        $instance->popoverTargetAction('invalid-value');
    }
}
