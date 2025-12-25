<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Link;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Link\HasRel;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Link\RelProvider;
use UIAwesome\Html\Attribute\Tests\Support\Stub\HasAttributes;
use UIAwesome\Html\Attribute\Values\Rel;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UnitEnum;

#[Group('link')]
final class HasRelTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RelProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithRelAttribute(
        string|UnitEnum|null $rel,
        array $attributes,
        string|UnitEnum $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasRel;
        };

        $instance = $instance->attributes($attributes)->rel($rel);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenRelAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRel;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingRelAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRel;
        };

        self::assertNotSame(
            $instance,
            $instance->rel(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RelProvider::class, 'values')]
    public function testSetRelAttributeValue(
        string|UnitEnum|null $rel,
        array $attributes,
        string|UnitEnum $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasRel;
        };

        $instance = $instance->attributes($attributes)->rel($rel);

        self::assertSame(
            $expected,
            $instance->getAttributes()['rel'] ?? '',
            $message,
        );
    }

    public function testThrowExceptionWhenSettingInvalidRelValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRel;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                'rel',
                implode('\', \'', Enum::normalizeArray(Rel::cases())),
            ),
        );

        $instance->rel('invalid-value');
    }
}
