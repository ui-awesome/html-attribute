<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use BackedEnum;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasReferrerpolicy;
use UIAwesome\Html\Attribute\Tests\Provider\ReferrerpolicyProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, Referrerpolicy};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasReferrerpolicy} trait managing the `referrerpolicy` HTML attribute.
 *
 * {@see ReferrerpolicyProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasReferrerpolicyTest extends TestCase
{
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
        string|Stringable|UnitEnum|null $referrerpolicy,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasReferrerpolicy;
        };

        $instance = $instance->attributes($attributes)->referrerpolicy($referrerpolicy);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::REFERRERPOLICY),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingReferrerpolicy(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasReferrerpolicy;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                Attribute::REFERRERPOLICY->value,
                implode("', '", array_map(static fn(BackedEnum $case): string => $case->value, Referrerpolicy::cases())),
            ),
        );

        $instance->referrerpolicy('invalid-value');
    }
}
