<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Link;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Link\HasHref;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Link\HrefProvider;
use UIAwesome\Html\Attribute\Tests\Support\Stub\HasAttributes;
use UIAwesome\Html\Helper\Attributes;

/**
 * Test suite for {@see HasHref} trait functionality and behavior.
 *
 * Validates the management of the HTML and SVG `href` attribute according to the HTML and SVG specifications.
 *
 * Ensures correct handling, immutability, and validation of the `href` attribute in tag rendering, supporting string
 * and `null` for dynamic assignment.
 *
 * Test coverage:
 * - Accurate rendering of attributes with the `href` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `href` attribute.
 * - Proper assignment, overriding, and validation of `href` value.
 *
 * {@see HrefProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('link')]
final class HasHrefTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(HrefProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithHrefAttribute(
        string|null $href,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasHref;
        };

        $instance = $instance->attributes($attributes)->href($href);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenHrefAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHref;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingHrefAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHref;
        };

        self::assertNotSame(
            $instance,
            $instance->href('https://example.com'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(HrefProvider::class, 'values')]
    public function testSetHrefAttributeValue(
        string|null $href,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasHref;
        };

        $instance = $instance->attributes($attributes)->href($href);

        self::assertSame(
            $expected,
            $instance->getAttributes()['href'] ?? '',
            $message,
        );
    }
}
