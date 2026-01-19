<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasCrossorigin;
use UIAwesome\Html\Attribute\Tests\Support\Provider\CrossoriginProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, Crossorigin};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasCrossorigin} trait managing the `crossorigin` HTML attribute.
 *
 * Verifies rendered output, immutability, attribute override, and validation behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `crossorigin` attribute is not provided.
 * - Sets the `crossorigin` HTML attribute and renders the expected output.
 * - Throws an exception when the `crossorigin` attribute value is invalid.
 *
 * {@see CrossoriginProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasCrossoriginTest extends TestCase
{
    public function testReturnEmptyWhenCrossoriginAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCrossorigin;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingCrossoriginAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCrossorigin;
        };

        self::assertNotSame(
            $instance,
            $instance->crossorigin(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(CrossoriginProvider::class, 'values')]
    public function testSetCrossoriginAttributeValue(
        string|UnitEnum|null $crossorigin,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasCrossorigin;
        };

        $instance = $instance->attributes($attributes)->crossorigin($crossorigin);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::CROSSORIGIN, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowExceptionWhenSettingInvalidCrossoriginValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCrossorigin;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                Attribute::CROSSORIGIN->value,
                implode('\', \'', Enum::normalizeArray(Crossorigin::cases())),
            ),
        );

        $instance->crossorigin('invalid-value');
    }
}
