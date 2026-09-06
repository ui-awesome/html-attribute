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
 * {@see ImageSrcSetProvider} for test case data providers.
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
    #[DataProviderExternal(ImageSrcSetProvider::class, 'values')]
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
