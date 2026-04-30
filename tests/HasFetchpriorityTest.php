<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasFetchpriority;
use UIAwesome\Html\Attribute\Tests\Provider\FetchpriorityProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, Fetchpriority};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasFetchpriority} trait managing the `fetchpriority` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `fetchpriority` attribute is not provided.
 * - Sets the `fetchpriority` HTML attribute and renders the expected output.
 * - Verifies invalid `fetchpriority` values throw an `InvalidArgumentException`.
 *
 * {@see FetchpriorityProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFetchpriorityTest extends TestCase
{
    public function testReturnEmptyWhenFetchpriorityAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFetchpriority;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingFetchpriorityAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFetchpriority;
        };

        self::assertNotSame(
            $instance,
            $instance->fetchpriority(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FetchpriorityProvider::class, 'values')]
    public function testSetFetchpriorityAttributeValue(
        string|UnitEnum|null $fetchpriority,
        array $attributes,
        string|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFetchpriority;
        };

        $instance = $instance->attributes($attributes)->fetchpriority($fetchpriority);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::FETCHPRIORITY),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingFetchpriority(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFetchpriority;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                Attribute::FETCHPRIORITY->value,
                implode("', '", array_map(static fn(\BackedEnum $case): string => $case->value, Fetchpriority::cases())),
            ),
        );

        $instance->fetchpriority('invalid-value');
    }
}
