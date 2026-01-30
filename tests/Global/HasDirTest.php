<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasDir;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Global\DirProvider;
use UIAwesome\Html\Attribute\Values\{Direction, GlobalAttribute};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasDir} trait managing the `dir` global HTML attribute.
 *
 * Verifies rendered output, immutability, attribute override, and validation behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `dir` attribute is not provided.
 * - Sets the `dir` global HTML attribute and renders the expected output.
 * - Throws an exception when the `dir` attribute value is invalid.
 *
 * {@see DirProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
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
        string|UnitEnum $expectedValue,
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
            $instance->getAttribute(GlobalAttribute::DIR, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidDirValue(): void
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
                implode('\', \'', Enum::normalizeArray(Direction::cases())),
            ),
        );

        $instance->dir('invalid-value');
    }
}
