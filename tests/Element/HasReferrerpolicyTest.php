<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Element\HasReferrerpolicy;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Element\ReferrerpolicyProvider;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, Referrerpolicy};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasReferrerpolicy} trait managing the `referrerpolicy` HTML attribute.
 *
 * Verifies rendered output, immutability, attribute override, and validation behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `referrerpolicy` attribute is not provided.
 * - Sets the `referrerpolicy` HTML attribute and renders the expected output.
 * - Throws an exception when the `referrerpolicy` attribute value is invalid.
 *
 * {@see ReferrerpolicyProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('element')]
final class HasReferrerpolicyTest extends TestCase
{
    public function testReturnEmptyWhenReferrerpolicyAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasReferrerpolicy;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingReferrerpolicyAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasReferrerpolicy;
        };

        self::assertNotSame(
            $instance,
            $instance->referrerpolicy(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ReferrerpolicyProvider::class, 'values')]
    public function testSetReferrerpolicyAttributeValue(
        string|UnitEnum|null $referrerpolicy,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasReferrerpolicy;
        };

        $instance = $instance->attributes($attributes)->referrerpolicy($referrerpolicy);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::REFERRERPOLICY, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingReferrerpolicyValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasReferrerpolicy;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                ElementAttribute::REFERRERPOLICY->value,
                implode("', '", Enum::normalizeArray(Referrerpolicy::cases())),
            ),
        );

        $instance->referrerpolicy('invalid-value');
    }
}
