<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasName;
use UIAwesome\Html\Attribute\Tests\Support\Provider\NameProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, MetaName};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasName} trait managing the `name` HTML attribute.
 *
 * Verifies rendered output, immutability, attribute override, and validation behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `name` attribute is not provided.
 * - Sets the `name` HTML attribute and renders the expected output.
 * - Throws an exception when the `name` attribute value is invalid.
 *
 * {@see NameProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasNameTest extends TestCase
{
    public function testReturnEmptyWhenNameAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasName;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingNameAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasName;
        };

        self::assertNotSame(
            $instance,
            $instance->name(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(NameProvider::class, 'values')]
    public function testSetNameAttributeValue(
        string|UnitEnum|null $name,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasName;
        };

        $instance = $instance->attributes($attributes)->name($name);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::NAME, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowExceptionWhenSettingInvalidNameValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasName;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-name',
                Attribute::NAME->value,
                implode("', '", Enum::normalizeArray(MetaName::cases())),
            ),
        );

        $instance->name('invalid-name');
    }
}
