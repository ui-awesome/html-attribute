<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasFetchpriority;
use UIAwesome\Html\Attribute\Tests\Support\Provider\FetchpriorityProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, Fetchpriority};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Test suite for {@see HasFetchpriority} trait functionality and behavior.
 *
 * Validates the management of the HTML `fetchpriority` attribute according to the HTML Living Standard specification.
 *
 * Ensures correct handling, immutability, and validation of the `fetchpriority` attribute in tag rendering, supporting
 * string and UnitEnum for dynamic assignment.
 *
 * Test coverage:
 * - Accurate rendering of attributes with the `fetchpriority` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `fetchpriority` attribute.
 * - Proper assignment, overriding, and validation of `fetchpriority` value.
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
        string|UnitEnum $expectedValue,
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
            $instance->getAttribute(Attribute::FETCHPRIORITY, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowExceptionWhenSettingInvalidFetchpriorityValue(): void
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
                implode('\', \'', Enum::normalizeArray(Fetchpriority::cases())),
            ),
        );

        $instance->fetchpriority('invalid-value');
    }
}
