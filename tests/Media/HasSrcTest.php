<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Media;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Media\HasSrc;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Media\SrcProvider;
use UIAwesome\Html\Attribute\Tests\Support\Stub\HasAttributes;
use UIAwesome\Html\Helper\Attributes;

/**
 * Test suite for {@see HasSrc} trait functionality and behavior.
 *
 * Validates the management of the HTML `src` attribute according to the HTML Living Standard specification.
 *
 * Ensures correct handling, immutability, and validation of the `src` attribute in tag rendering, supporting string and
 * `null` for dynamic assignment.
 *
 * Test coverage:
 * - Accurate rendering of attributes with the `src` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `src` attribute.
 * - Proper assignment, overriding, and validation of `src` value.
 *
 * {@see SrcProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('media')]
final class HasSrcTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(SrcProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithSrcAttribute(
        string|null $src,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasSrc;
        };

        $instance = $instance->attributes($attributes)->src($src);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenSrcAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSrc;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingSrcAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSrc;
        };

        self::assertNotSame(
            $instance,
            $instance->src(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(SrcProvider::class, 'values')]
    public function testSetSrcAttributeValue(
        string|null $src,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasSrc;
        };

        $instance = $instance->attributes($attributes)->src($src);

        self::assertSame(
            $expected,
            $instance->getAttributes()['src'] ?? '',
            $message,
        );
    }
}
