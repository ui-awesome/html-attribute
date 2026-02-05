<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasImagesrcset;
use UIAwesome\Html\Attribute\Tests\Provider\ImagesrcsetProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasImagesrcset} trait managing the `imagesrcset` HTML attribute.
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
final class HasImagesrcsetTest extends TestCase
{
    public function testReturnEmptyWhenImagesrcsetAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasImagesrcset;
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
            use HasImagesrcset;
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
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasImagesrcset;
        };

        $instance = $instance->attributes($attributes)->imagesrcset($imagesrcset);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::IMAGESRCSET, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
