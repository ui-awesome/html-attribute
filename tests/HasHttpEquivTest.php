<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasHttpEquiv;
use UIAwesome\Html\Attribute\Tests\Provider\HttpEquivProvider;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, HttpEquiv};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasHttpEquiv} trait managing the `http-equiv` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `http-equiv` attribute is not provided.
 * - Sets the `http-equiv` HTML attribute and renders the expected output.
 * - Verifies invalid `http-equiv` values throw an `InvalidArgumentException`.
 *
 * {@see HttpEquivProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasHttpEquivTest extends TestCase
{
    public function testReturnEmptyWhenHttpEquivAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHttpEquiv;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingHttpEquivAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHttpEquiv;
        };

        self::assertNotSame(
            $instance,
            $instance->httpEquiv(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(HttpEquivProvider::class, 'values')]
    public function testSetHttpEquivAttributeValue(
        string|Stringable|UnitEnum|null $httpEquiv,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasHttpEquiv;
        };

        $instance = $instance->attributes($attributes)->httpEquiv($httpEquiv);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::HTTP_EQUIV),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingHttpEquiv(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHttpEquiv;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                ElementAttribute::HTTP_EQUIV->value,
                implode("', '", array_map(static fn(\BackedEnum $case): string => $case->value, HttpEquiv::cases())),
            ),
        );

        $instance->httpEquiv('invalid-value');
    }
}
