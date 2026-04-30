<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasImageSrcSet;
use UIAwesome\Html\Attribute\Tests\Provider\ImageSrcSetProvider;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasImageSrcSet} trait managing the `imagesrcset` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `imagesrcset` attribute is not provided.
 * - Sets the `imagesrcset` HTML attribute and renders the expected output.
 *
 * {@see ImagesrcsetProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasImageSrcSetTest extends TestCase
{
    public function testReturnEmptyWhenImagesrcsetAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasImageSrcSet;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingImagesrcsetAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasImageSrcSet;
        };

        self::assertNotSame(
            $instance,
            $instance->imagesrcset(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ImagesrcsetProvider::class, 'values')]
    public function testSetImagesrcsetAttributeValue(
        string|Stringable|UnitEnum|null $imagesrcset,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasImageSrcSet;
        };

        $instance = $instance->attributes($attributes)->imagesrcset($imagesrcset);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::IMAGESRCSET),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
