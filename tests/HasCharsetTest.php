<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasCharset;
use UIAwesome\Html\Attribute\Tests\Provider\CharsetProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, Charset};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasCharset} trait managing the `charset` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `charset` attribute is not provided.
 * - Sets the `charset` HTML attribute and renders the expected output.
 * - Verifies invalid `charset` values throw an `InvalidArgumentException`.
 *
 * {@see CharsetProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasCharsetTest extends TestCase
{
    public function testReturnEmptyWhenCharsetAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCharset;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingCharsetAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCharset;
        };

        self::assertNotSame(
            $instance,
            $instance->charset(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(CharsetProvider::class, 'values')]
    public function testSetCharsetAttributeValue(
        string|Stringable|UnitEnum|null $charset,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasCharset;
        };

        $instance = $instance->attributes($attributes)->charset($charset);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::CHARSET, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingCharsetValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCharset;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                Attribute::CHARSET->value,
                implode("', '", Enum::normalizeArray(Charset::cases())),
            ),
        );

        $instance->charset('invalid-value');
    }
}
