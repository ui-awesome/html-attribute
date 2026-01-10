<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Element\HasDecoding;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Element\DecodingProvider;
use UIAwesome\Html\Attribute\Values\{Decoding, ElementAttribute};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Test suite for {@see HasDecoding} trait functionality and behavior.
 *
 * Validates the management of the HTML/SVG `decoding` attribute according to the HTML Living Standard specification.
 *
 * Ensures correct handling, immutability, and validation of the `decoding` attribute in tag rendering, supporting
 * string, UnitEnum, and `null` for dynamic assignment.
 *
 * Test coverage:
 * - Accurate rendering of attributes with the `decoding` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `decoding` attribute.
 * - Proper assignment, overriding, and validation of `decoding` value.
 *
 * {@see DecodingProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasDecodingTest extends TestCase
{
    public function testReturnEmptyWhenDecodingAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDecoding;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingDecodingAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDecoding;
        };

        self::assertNotSame(
            $instance,
            $instance->decoding(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DecodingProvider::class, 'values')]
    public function testSetDecodingAttributeValue(
        string|UnitEnum|null $decoding,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasDecoding;
        };

        $instance = $instance->attributes($attributes)->decoding($decoding);

        self::assertSame(
            $expectedValue,
            $instance->getAttributes()[ElementAttribute::DECODING->value] ?? '',
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowExceptionWhenSettingInvalidDecodingValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDecoding;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                ElementAttribute::DECODING->value,
                implode('\', \'', Enum::normalizeArray(Decoding::cases())),
            ),
        );

        $instance->decoding('invalid-value');
    }
}
