<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use Closure;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use stdClass;
use Stringable;
use UIAwesome\Html\Attribute\Exception\Message;
use UIAwesome\Html\Attribute\Global\HasAria;
use UIAwesome\Html\Attribute\Tests\Provider\Global\AriaProvider;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasAria} trait managing global `aria-*` HTML attributes.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `aria-*` attribute is not provided.
 * - Normalizes keys when setting `aria-*` attributes.
 * - Renders expected output when `aria-*` attributes are set.
 * - Sets `aria-*` attributes and renders the expected output.
 * - Verifies invalid keys throw an `InvalidArgumentException`.
 * - Verifies invalid values throw an `InvalidArgumentException`.
 *
 * {@see AriaProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasAriaTest extends TestCase
{
    /**
     * @param mixed[] $data
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AriaProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithAriaAttribute(
        array $data,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAria;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->ariaAttributes($data);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenAriaAttributeNotSet(): void
    {
        $instance = new class {
            use HasAria;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingAriaAttribute(): void
    {
        $instance = new class {
            use HasAria;
            use HasAttributes;
        };

        self::assertNotSame(
            $instance,
            $instance->addAriaAttribute('pressed', true),
            'Should return a new instance when adding the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $instance,
            $instance->ariaAttributes(['pressed' => true]),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $instance,
            $instance->removeAriaAttribute('pressed'),
            'Should return a new instance when removing the attribute, ensuring immutability.',
        );
    }

    /**
     * @param mixed[] $data
     * @param mixed[] $expected
     */
    #[DataProviderExternal(AriaProvider::class, 'values')]
    public function testSetAriaAttributeValue(array $data, array $expected, string $message): void
    {
        $instance = new class {
            use HasAria;
            use HasAttributes;
        };

        $instance = $instance->ariaAttributes($data);

        self::assertSame(
            $expected,
            $instance->getAttributes(),
            $message,
        );
    }

    /**
     * @phpstan-param scalar|Stringable|UnitEnum|null|Closure(): mixed $value
     * @phpstan-param mixed[] $expected
     */
    #[DataProviderExternal(AriaProvider::class, 'value')]
    public function testSetSingleAriaAttributeValue(
        string|UnitEnum $key,
        bool|float|int|string|Closure|Stringable|UnitEnum|null $value,
        array $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAria;
            use HasAttributes;
        };

        $instance = $instance->addAriaAttribute($key, $value);

        self::assertSame(
            $expected,
            $instance->getAttributes(),
            $message,
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AriaProvider::class, 'invalidKey')]
    public function testThrowInvalidArgumentExceptionForAriaAttributeKeyIsInvalid(array $attributes): void
    {
        $instance = new class {
            use HasAria;
            use HasAttributes;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::KEY_MUST_BE_NON_EMPTY_STRING->getMessage(),
        );

        $instance->ariaAttributes($attributes);
    }

    public function testThrowInvalidArgumentExceptionForAriaAttributeValueIsInvalid(): void
    {
        $instance = new class {
            use HasAria;
            use HasAttributes;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::ATTRIBUTE_VALUE_MUST_BE_SCALAR_OR_CLOSURE->getMessage('object'),
        );

        $instance->ariaAttributes(['key' => new stdClass()]);
    }

    #[DataProviderExternal(AriaProvider::class, 'invalidSingleKey')]
    public function testThrowInvalidArgumentExceptionForSingleAriaAttributeKeyIsInvalid(
        string|UnitEnum $key,
        string $value,
    ): void {
        $instance = new class {
            use HasAria;
            use HasAttributes;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::KEY_MUST_BE_NON_EMPTY_STRING->getMessage(),
        );

        $instance->addAriaAttribute($key, $value);
    }
}
