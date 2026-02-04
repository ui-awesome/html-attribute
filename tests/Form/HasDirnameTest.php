<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Form;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Form\HasDirname;
use UIAwesome\Html\Attribute\Tests\Provider\Form\DirnameProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasDirname} trait managing the `dirname` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `dirname` attribute is not provided.
 * - Sets the `dirname` HTML attribute and renders the expected output.
 *
 * {@see DirnameProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasDirnameTest extends TestCase
{
    public function testReturnEmptyWhenDirnameAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDirname;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingDirnameAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDirname;
        };

        self::assertNotSame(
            $instance,
            $instance->dirname(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DirnameProvider::class, 'values')]
    public function testSetDirnameAttributeValue(
        string|Stringable|UnitEnum|null $dirname,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasDirname;
        };

        $instance = $instance->attributes($attributes)->dirname($dirname);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::DIRNAME, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
