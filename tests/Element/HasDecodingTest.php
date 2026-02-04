<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Element\HasDecoding;
use UIAwesome\Html\Attribute\Tests\Provider\Element\DecodingProvider;
use UIAwesome\Html\Attribute\Values\{Decoding, ElementAttribute};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasDecoding} trait managing the `decoding` HTML/SVG attribute.
 *
 * Verifies rendered output, immutability, attribute override, and validation behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `decoding` attribute is not provided.
 * - Sets the `decoding` HTML/SVG attribute and renders the expected output.
 * - Throws an exception when the `decoding` attribute value is invalid.
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
        string|Stringable|UnitEnum|null $decoding,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
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
            $instance->getAttribute(ElementAttribute::DECODING, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingDecodingValue(): void
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
                implode("', '", Enum::normalizeArray(Decoding::cases())),
            ),
        );

        $instance->decoding('invalid-value');
    }
}
