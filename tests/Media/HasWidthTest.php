<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Media;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Media\HasWidth;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Media\WidthProvider;
use UIAwesome\Html\Attribute\Tests\Support\Stub\HasAttributes;
use UIAwesome\Html\Helper\Attributes;

#[Group('media')]
final class HasWidthTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(WidthProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithWidthAttribute(
        string|null $width,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasWidth;
        };

        $instance = $instance->attributes($attributes)->width($width);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenWidthAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasWidth;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingWidthAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasWidth;
        };

        self::assertNotSame(
            $instance,
            $instance->width(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(WidthProvider::class, 'values')]
    public function testSetWidthAttributeValue(
        string|null $width,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasWidth;
        };

        $instance = $instance->attributes($attributes)->width($width);

        self::assertSame(
            $expected,
            $instance->getAttributes()['width'] ?? '',
            $message,
        );
    }
}
