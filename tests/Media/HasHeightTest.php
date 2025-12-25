<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Media;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Media\HasHeight;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Media\HeightProvider;
use UIAwesome\Html\Attribute\Tests\Support\Stub\HasAttributes;
use UIAwesome\Html\Helper\Attributes;

#[Group('media')]
final class HasHeightTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(HeightProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithHeightAttribute(
        string|null $height,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasHeight;
        };

        $instance = $instance->attributes($attributes)->height($height);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenHeightAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHeight;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingHeightAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasHeight;
        };

        self::assertNotSame(
            $instance,
            $instance->height(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(HeightProvider::class, 'values')]
    public function testSetHeightAttributeValue(
        string|null $height,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasHeight;
        };

        $instance = $instance->attributes($attributes)->height($height);

        self::assertSame(
            $expected,
            $instance->getAttributes()['height'] ?? '',
            $message,
        );
    }
}
