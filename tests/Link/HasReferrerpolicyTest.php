<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Link;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Link\HasReferrerpolicy;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Link\ReferrerpolicyProvider;
use UIAwesome\Html\Attribute\Tests\Support\Stub\HasAttributes;
use UIAwesome\Html\Attribute\Values\Referrerpolicy;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UnitEnum;

/**
 * Test suite for {@see HasReferrerpolicy} trait functionality and behavior.
 *
 * Validates the management of the HTML `referrerpolicy` attribute according to the HTML Living Standard specification.
 *
 * Ensures correct handling, immutability, and validation of the `referrerpolicy` attribute in tag rendering, supporting
 * string and UnitEnum for dynamic assignment.
 *
 * Test coverage:
 * - Accurate rendering of attributes with the `referrerpolicy` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `referrerpolicy` attribute.
 * - Proper assignment, overriding, and validation of `referrerpolicy` value.
 *
 * {@see ReferrerpolicyProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('link')]
final class HasReferrerpolicyTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ReferrerpolicyProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithReferrerpolicyAttribute(
        string|UnitEnum|null $referrerpolicy,
        array $attributes,
        string|UnitEnum $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasReferrerpolicy;
        };

        $instance = $instance->attributes($attributes)->referrerpolicy($referrerpolicy);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenReferrerpolicyAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasReferrerpolicy;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingReferrerpolicyAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasReferrerpolicy;
        };

        self::assertNotSame(
            $instance,
            $instance->referrerpolicy(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ReferrerpolicyProvider::class, 'values')]
    public function testSetReferrerpolicyAttributeValue(
        string|UnitEnum|null $referrerpolicy,
        array $attributes,
        string|UnitEnum $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasReferrerpolicy;
        };

        $instance = $instance->attributes($attributes)->referrerpolicy($referrerpolicy);

        self::assertSame(
            $expected,
            $instance->getAttributes()['referrerpolicy'] ?? '',
            $message,
        );
    }

    public function testThrowExceptionWhenSettingInvalidReferrerpolicyValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasReferrerpolicy;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                'referrerpolicy',
                implode('\', \'', Enum::normalizeArray(Referrerpolicy::cases())),
            ),
        );

        $instance->referrerpolicy('invalid-value');
    }
}
