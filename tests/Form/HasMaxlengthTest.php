<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Form;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Exception\Message;
use UIAwesome\Html\Attribute\Form\HasMaxlength;
use UIAwesome\Html\Attribute\Tests\Provider\Form\MaxlengthProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasMaxlength} trait managing the `maxlength` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `maxlength` attribute is not provided.
 * - Sets the `maxlength` HTML attribute and renders the expected output.
 * - Verifies invalid `maxlength` values throw an `InvalidArgumentException`.
 *
 * {@see MaxlengthProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasMaxlengthTest extends TestCase
{
    public function testReturnEmptyWhenMaxlengthAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMaxlength;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMaxlengthAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMaxlength;
        };

        self::assertNotSame(
            $instance,
            $instance->maxlength(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(MaxlengthProvider::class, 'values')]
    public function testSetMaxlengthAttributeValue(
        int|string|Stringable|UnitEnum|null $maxlength,
        array $attributes,
        int|string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMaxlength;
        };

        $instance = $instance->attributes($attributes)->maxlength($maxlength);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::MAXLENGTH, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    #[DataProviderExternal(MaxlengthProvider::class, 'invalidValues')]
    public function testThrowInvalidArgumentExceptionForSettingMaxlengthAttribute(
        int|string|Stringable|UnitEnum $maxlength,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMaxlength;
        };

        if ($maxlength instanceof UnitEnum) {
            $maxlength = Enum::normalizeValue($maxlength);
        }

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::ATTRIBUTE_INVALID_VALUE->getMessage(
                (string) $maxlength,
                Attribute::MAXLENGTH->value,
                'value >= 0',
            ),
        );

        $instance->maxlength($maxlength);
    }
}
