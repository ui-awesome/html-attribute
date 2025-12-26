<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Media;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Media\HasAlt;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Media\AltProvider;
use UIAwesome\Html\Attribute\Tests\Support\Stub\HasAttributes;
use UIAwesome\Html\Helper\Attributes;

/**
 * Test suite for {@see HasAlt} trait functionality and behavior.
 *
 * Validates the management of the HTML `alt` attribute according to the HTML Living Standard specification.
 *
 * Ensures correct handling, immutability, and validation of the `alt` attribute in tag rendering, supporting string and
 * `null` for dynamic assignment.
 *
 * Test coverage:
 * - Accurate rendering of attributes with the `alt` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `alt` attribute.
 * - Proper assignment, overriding, and validation of `alt` value.
 *
 * {@see AltProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('media')]
final class HasAltTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AltProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithAltAttribute(
        string|null $alt,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAlt;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->alt($alt);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenAltAttributeNotSet(): void
    {
        $instance = new class {
            use HasAlt;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingAltAttribute(): void
    {
        $instance = new class {
            use HasAlt;
            use HasAttributes;
        };

        self::assertNotSame(
            $instance,
            $instance->alt(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AltProvider::class, 'values')]
    public function testSetAltAttributeValue(
        string|null $alt,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAlt;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->alt($alt);

        self::assertSame(
            $expected,
            $instance->getAttributes()['alt'] ?? '',
            $message,
        );
    }
}
