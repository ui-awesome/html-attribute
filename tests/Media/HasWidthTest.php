<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Media;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Media\HasWidth;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Media\WidthProvider;
use UIAwesome\Html\Attribute\Tests\Support\Stub\HasAttributes;
use UIAwesome\Html\Helper\Attributes;

/**
 * Test suite for {@see HasWidth} trait functionality and behavior.
 *
 * Validates the management of the HTML `width` attribute according to the HTML Living Standard specification.
 *
 * Ensures correct handling, immutability, and validation of the `width` attribute in tag rendering, supporting string
 * and `null` for dynamic assignment.
 *
 * Test coverage:
 * - Accurate rendering of attributes with the `width` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `width` attribute.
 * - Proper assignment, overriding, and validation of `width` value.
 *
 * {@see WidthProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('media')]
final class HasWidthTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(WidthProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithWidthAttribute(
        string|null $width,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasWidth;
        };

        $instance = $instance->attributes($attributes)->width($width);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenWidthAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasWidth;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingWidthAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasWidth;
        };

        self::assertNotSame(
            $instance,
            $instance->width(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(WidthProvider::class, 'values')]
    public function testSetWidthAttributeValue(
        string|null $width,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasWidth;
        };

        $instance = $instance->attributes($attributes)->width($width);

        self::assertSame(
            $expected,
            $instance->getAttributes()['width'] ?? '',
            $message,
        );
    }
}
