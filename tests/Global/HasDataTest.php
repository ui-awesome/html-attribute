<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use Closure;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Exception\Message;
use UIAwesome\Html\Attribute\Global\HasData;
use UIAwesome\Html\Attribute\Tests\Provider\Global\DataProvider;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasData} trait managing global `data-*` HTML attributes.
 *
 * {@see DataProvider} for test case data providers.
 */
#[Group('global')]
final class HasDataTest extends TestCase
{
    /**
     * @param mixed[] $data
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DataProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithDataAttribute(
        array $data,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasData;
        };

        $instance = $instance->attributes($attributes)->dataAttributes($data);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnNewInstanceWhenSettingDataAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasData;
        };

        self::assertNotSame(
            $instance,
            $instance->addDataAttribute('action', 'test-action'),
            'Should return a new instance when adding the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $instance,
            $instance->dataAttributes(['action' => 'test-action']),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $instance,
            $instance->removeDataAttribute('action'),
            'Should return a new instance when removing the attribute, ensuring immutability.',
        );
    }

    /**
     * @param mixed[] $data
     * @param mixed[] $expected
     */
    #[DataProviderExternal(DataProvider::class, 'values')]
    public function testSetDataAttributeValue(array $data, array $expected, string $message): void
    {
        $instance = new class {
            use HasAttributes;
            use HasData;
        };

        $instance = $instance->dataAttributes($data);

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
    #[DataProviderExternal(DataProvider::class, 'value')]
    public function testSetSingleDataAttributeValue(
        string|UnitEnum $key,
        bool|float|int|string|Closure|Stringable|UnitEnum|null $value,
        array $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasData;
        };

        $instance = $instance->addDataAttribute($key, $value);

        self::assertSame(
            $expected,
            $instance->getAttributes(),
            $message,
        );
    }

    #[DataProviderExternal(DataProvider::class, 'invalidSingleKey')]
    public function testThrowInvalidArgumentExceptionWhenSettingAddDataAttribute(
        string|UnitEnum $key,
        string $value,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasData;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::KEY_MUST_BE_NON_EMPTY_STRING->getMessage(),
        );

        $instance->addDataAttribute($key, $value);
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DataProvider::class, 'invalidKey')]
    public function testThrowInvalidArgumentExceptionWhenSettingDataAttributes(array $attributes): void
    {
        $instance = new class {
            use HasAttributes;
            use HasData;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::KEY_MUST_BE_NON_EMPTY_STRING->getMessage(),
        );

        $instance->dataAttributes($attributes);
    }
}
