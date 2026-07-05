<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use BackedEnum;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasInputMode;
use UIAwesome\Html\Attribute\Tests\Provider\Global\InputModeProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, InputMode};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasInputMode} trait managing the `inputmode` global HTML attribute.
 *
 * {@see InputModeProvider} for test case data providers.
 */
#[Group('global')]
final class HasInputModeTest extends TestCase
{
    public function testReturnEmptyWhenInputModeAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasInputMode;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingInputModeAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasInputMode;
        };

        self::assertNotSame(
            $instance,
            $instance->inputMode(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(InputModeProvider::class, 'values')]
    public function testSetInputModeAttributeValue(
        string|UnitEnum|null $inputMode,
        array $attributes,
        string|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasInputMode;
        };

        $instance = $instance->attributes($attributes)->inputMode($inputMode);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::INPUTMODE),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingInputMode(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasInputMode;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                GlobalAttribute::INPUTMODE->value,
                implode("', '", array_map(static fn(BackedEnum $case): string => $case->value, InputMode::cases())),
            ),
        );

        $instance->inputMode('invalid-value');
    }
}
