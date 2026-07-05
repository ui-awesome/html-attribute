<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use BackedEnum;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasDir;
use UIAwesome\Html\Attribute\Tests\Provider\Global\DirProvider;
use UIAwesome\Html\Attribute\Values\{Direction, GlobalAttribute};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasDir} trait managing the `dir` global HTML attribute.
 *
 * {@see DirProvider} for test case data providers.
 */
#[Group('global')]
final class HasDirTest extends TestCase
{
    public function testReturnEmptyWhenDirAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDir;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingDirAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDir;
        };

        self::assertNotSame(
            $instance,
            $instance->dir(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DirProvider::class, 'values')]
    public function testSetDirAttributeValue(
        string|UnitEnum|null $dir,
        array $attributes,
        string|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasDir;
        };

        $instance = $instance->attributes($attributes)->dir($dir);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::DIR),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingDir(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDir;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                GlobalAttribute::DIR->value,
                implode("', '", array_map(static fn(BackedEnum $case): string => $case->value, Direction::cases())),
            ),
        );

        $instance->dir('invalid-value');
    }
}
