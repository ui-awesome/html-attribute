<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasAs;
use UIAwesome\Html\Attribute\Tests\Support\Provider\AsProvider;
use UIAwesome\Html\Attribute\Values\{AsValue, Attribute};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasAs} trait managing the `as` HTML attribute.
 *
 * Verifies rendered output, immutability, attribute override, and validation behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `as` attribute is not provided.
 * - Sets the `as` HTML attribute and renders the expected output.
 * - Throws an exception when the `as` attribute value is invalid.
 *
 * {@see AsProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasAsTest extends TestCase
{
    public function testReturnEmptyWhenAsAttributeNotSet(): void
    {
        $instance = new class {
            use HasAs;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingAsAttribute(): void
    {
        $instance = new class {
            use HasAs;
            use HasAttributes;
        };

        self::assertNotSame(
            $instance,
            $instance->as(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AsProvider::class, 'values')]
    public function testSetAsAttributeValue(
        string|UnitEnum|null $as,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAs;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->as($as);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::AS, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingAsValue(): void
    {
        $instance = new class {
            use HasAs;
            use HasAttributes;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                Attribute::AS->value,
                implode("', '", Enum::normalizeArray(AsValue::cases())),
            ),
        );

        $instance->as('invalid-value');
    }
}
