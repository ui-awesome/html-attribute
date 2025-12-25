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
