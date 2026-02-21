<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Element;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Element\HasLoading;
use UIAwesome\Html\Attribute\Tests\Provider\Element\LoadingProvider;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, Loading};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasLoading} trait managing the `loading` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `loading` attribute is not provided.
 * - Sets the `loading` HTML attribute and renders the expected output.
 * - Verifies invalid `loading` values throw an `InvalidArgumentException`.
 *
 * {@see LoadingProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('element')]
final class HasLoadingTest extends TestCase
{
    public function testReturnEmptyWhenLoadingAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLoading;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingLoadingAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLoading;
        };

        self::assertNotSame(
            $instance,
            $instance->loading(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(LoadingProvider::class, 'values')]
    public function testSetLoadingAttributeValue(
        string|Stringable|UnitEnum|null $loading,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasLoading;
        };

        $instance = $instance->attributes($attributes)->loading($loading);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::LOADING, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingLoading(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLoading;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                ElementAttribute::LOADING->value,
                implode("', '", Enum::normalizeArray(Loading::cases())),
            ),
        );

        $instance->loading('invalid-value');
    }
}
