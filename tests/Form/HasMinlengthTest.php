<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Form;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Exception\Message;
use UIAwesome\Html\Attribute\Form\HasMinlength;
use UIAwesome\Html\Attribute\Tests\Provider\Form\MinlengthProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasMinlength} trait managing the `minlength` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `minlength` attribute is not provided.
 * - Sets the `minlength` HTML attribute and renders the expected output.
 *
 * {@see MinlengthProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasMinlengthTest extends TestCase
{
    public function testReturnEmptyWhenMinlengthAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMinlength;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMinlengthAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMinlength;
        };

        self::assertNotSame(
            $instance,
            $instance->minlength(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(MinlengthProvider::class, 'values')]
    public function testSetMinlengthAttributeValue(
        int|string|Stringable|UnitEnum|null $minlength,
        array $attributes,
        int|string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMinlength;
        };

        $instance = $instance->attributes($attributes)->minlength($minlength);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::MINLENGTH, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    #[DataProviderExternal(MinlengthProvider::class, 'invalidValues')]
    public function testThrowInvalidArgumentExceptionForSettingInvalidMinlengthAttribute(
        int|string|Stringable|UnitEnum $minlength,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMinlength;
        };

        if ($minlength instanceof UnitEnum) {
            $minlength = Enum::normalizeValue($minlength);
        }

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::ATTRIBUTE_INVALID_VALUE->getMessage(
                (string) $minlength,
                Attribute::MINLENGTH->value,
                'value >= 0',
            ),
        );

        $instance->minlength($minlength);
    }
}
