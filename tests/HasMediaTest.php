<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasMedia;
use UIAwesome\Html\Attribute\Tests\Provider\MediaProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasMedia} trait managing the `media` HTML attribute.
 *
 * {@see MediaProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasMediaTest extends TestCase
{
    public function testReturnEmptyWhenMediaAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMedia;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMediaAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMedia;
        };

        self::assertNotSame(
            $instance,
            $instance->media(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(MediaProvider::class, 'values')]
    public function testSetMediaAttributeValue(
        string|Stringable|UnitEnum|null $media,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMedia;
        };

        $instance = $instance->attributes($attributes)->media($media);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::MEDIA),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
