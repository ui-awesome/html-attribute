<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use BackedEnum;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasRel;
use UIAwesome\Html\Attribute\Tests\Provider\RelProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, Rel};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasRel} trait managing the `rel` HTML attribute.
 *
 * {@see RelProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasRelTest extends TestCase
{
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
        string|Stringable|UnitEnum|null $rel,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasRel;
        };

        $instance = $instance->attributes($attributes)->rel($rel);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::REL),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingRel(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRel;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                Attribute::REL->value,
                implode("', '", array_map(static fn(BackedEnum $case): string => $case->value, Rel::cases())),
            ),
        );

        $instance->rel('invalid-value');
    }
}
