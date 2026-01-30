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
use UIAwesome\Html\Attribute\Global\HasEvents;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Global\EventProvider;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasEvents} trait managing global `on*` HTML event handler attributes.
 *
 * Verifies rendered output, immutability, key normalization, and validation behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures invalid keys and values throw expected exceptions.
 * - Normalizes keys and values when setting `on*` event attributes.
 * - Renders expected output when `on*` event attributes are set.
 *
 * {@see EventProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasEventsTest extends TestCase
{
    /**
     * @param mixed[] $data
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(EventProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithEventAttribute(
        array $data,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasEvents;
        };

        $instance = $instance->attributes($attributes)->events($data);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenEventAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasEvents;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingEventAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasEvents;
        };

        self::assertNotSame(
            $instance,
            $instance->addEvent('onclick', "alert('test')"),
            'Should return a new instance when adding the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $instance,
            $instance->events(['onclick' => "alert('test')"]),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $instance,
            $instance->removeEvent('onclick'),
            'Should return a new instance when removing the attribute, ensuring immutability.',
        );
    }

    /**
     * @param mixed[] $data
     * @param mixed[] $expected
     */
    #[DataProviderExternal(EventProvider::class, 'values')]
    public function testSetEventAttributeValue(array $data, array $expected, string $message): void
    {
        $instance = new class {
            use HasAttributes;
            use HasEvents;
        };

        $instance = $instance->events($data);

        self::assertSame(
            $expected,
            $instance->getAttributes(),
            $message,
        );
    }

    /**
     * @phpstan-param string|\UnitEnum $key
     * @phpstan-param string|Stringable|null|Closure(): mixed $handler
     * @phpstan-param mixed[] $expected
     */
    #[DataProviderExternal(EventProvider::class, 'value')]
    public function testSetSingleEventAttributeValue(
        string|UnitEnum $key,
        string|Closure|Stringable|UnitEnum|null $handler,
        array $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasEvents;
        };

        $instance = $instance->addEvent($key, $handler);

        self::assertSame(
            $expected,
            $instance->getAttributes(),
            $message,
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(EventProvider::class, 'invalidKey')]
    public function testThrowInvalidArgumentExceptionForEventAttributeKeyIsInvalid(array $attributes): void
    {
        $instance = new class {
            use HasAttributes;
            use HasEvents;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::KEY_MUST_BE_NON_EMPTY_STRING->getMessage(),
        );

        $instance->events($attributes);
    }

    public function testThrowInvalidArgumentExceptionForEventAttributeValueIsInvalid(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasEvents;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::ATTRIBUTE_VALUE_MUST_BE_SCALAR_OR_CLOSURE->getMessage('object'),
        );

        $instance->events(['onclick' => new stdClass()]);
    }

    #[DataProviderExternal(EventProvider::class, 'invalidSingleKey')]
    public function testThrowInvalidArgumentExceptionForRemoveEventAttributeKeyIsInvalid(
        string|UnitEnum $key,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasEvents;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::KEY_MUST_BE_NON_EMPTY_STRING->getMessage(),
        );

        $instance->removeEvent($key);
    }

    #[DataProviderExternal(EventProvider::class, 'invalidSingleKey')]
    public function testThrowInvalidArgumentExceptionForSingleEventAttributeKeyIsInvalid(
        string|UnitEnum $key,
        string $handler,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasEvents;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::KEY_MUST_BE_NON_EMPTY_STRING->getMessage(),
        );

        $instance->addEvent($key, $handler);
    }
}
