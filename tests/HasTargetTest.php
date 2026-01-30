<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasTarget;
use UIAwesome\Html\Attribute\Tests\Support\Provider\TargetProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, Target};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasTarget} trait managing the `target` HTML attribute.
 *
 * Verifies rendered output, immutability, attribute override, and validation behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `target` attribute is not provided.
 * - Sets the `target` HTML attribute and renders the expected output.
 * - Throws an exception when the `target` attribute value is invalid.
 *
 * {@see TargetProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasTargetTest extends TestCase
{
    public function testReturnEmptyWhenTargetAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTarget;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingTargetAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTarget;
        };

        self::assertNotSame(
            $instance,
            $instance->target(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(TargetProvider::class, 'values')]
    public function testSetTargetAttributeValue(
        string|UnitEnum|null $target,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasTarget;
        };

        $instance = $instance->attributes($attributes)->target($target);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::TARGET, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowExceptionWhenSettingInvalidTargetValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTarget;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-target',
                Attribute::TARGET->value,
                implode('\', \'', Enum::normalizeArray(Target::cases())),
            ),
        );

        $instance->target('invalid-target');
    }
}
