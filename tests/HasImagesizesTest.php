<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasImagesizes;
use UIAwesome\Html\Attribute\Tests\Provider\ImagesizesProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasImagesizes} trait managing the `imagesizes` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `imagesizes` attribute is not provided.
 * - Sets the `imagesizes` HTML attribute and renders the expected output.
 *
 * {@see ImagesizesProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasImagesizesTest extends TestCase
{
    public function testReturnEmptyWhenImagesizesAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasImagesizes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingImagesizesAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasImagesizes;
        };

        self::assertNotSame(
            $instance,
            $instance->imagesizes(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ImagesizesProvider::class, 'values')]
    public function testSetImagesizesAttributeValue(
        string|Stringable|UnitEnum|null $imagesizes,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasImagesizes;
        };

        $instance = $instance->attributes($attributes)->imagesizes($imagesizes);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::IMAGESIZES, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
