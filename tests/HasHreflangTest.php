<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasHreflang;
use UIAwesome\Html\Attribute\Tests\Provider\HreflangProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasHreflang} trait managing the `hreflang` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `hreflang` attribute is not provided.
 * - Sets the `hreflang` HTML attribute and renders the expected output.
 *
 * {@see HreflangProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasHreflangTest extends TestCase
{
    public function testReturnEmptyWhenHreflangAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHreflang;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingHreflangAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHreflang;
        };

        self::assertNotSame(
            $instance,
            $instance->hreflang(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(HreflangProvider::class, 'values')]
    public function testSetHreflangAttributeValue(
        string|Stringable|UnitEnum|null $hreflang,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasHreflang;
        };

        $instance = $instance->attributes($attributes)->hreflang($hreflang);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::HREFLANG, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
