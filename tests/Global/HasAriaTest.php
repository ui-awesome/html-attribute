<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use Closure;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Global\HasAria;
use UIAwesome\Html\Attribute\Tests\Provider\Global\AriaProvider;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasAria} trait managing global `aria-*` HTML attributes.
 *
 * {@see AriaProvider} for test case data providers.
 */
#[Group('global')]
final class HasAriaTest extends TestCase
{
    /**
     * @param mixed[] $data
     * @param mixed[] $expected
     */
    #[DataProviderExternal(AriaProvider::class, 'values')]
    public function testAriaAttributeValue(array $data, array $expected, string $message): void
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
     * @phpstan-param scalar|Stringable|UnitEnum|null|Closure(): mixed $value
     * @phpstan-param mixed[] $expected
     */
    #[DataProviderExternal(AriaProvider::class, 'value')]
    public function testSetAriaAttributeValue(
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

    #[DataProviderExternal(AriaProvider::class, 'invalidSingleKey')]
    public function testThrowInvalidArgumentExceptionWhenSettingAddAriaAttribute(
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

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AriaProvider::class, 'invalidKey')]
    public function testThrowInvalidArgumentExceptionWhenSettingAriaAttributes(array $attributes): void
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
}
