<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Media;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Media\HasSrc;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Media\SrcProvider;
use UIAwesome\Html\Attribute\Tests\Support\Stub\HasAttributes;
use UIAwesome\Html\Helper\Attributes;

#[Group('media')]
final class HasSrcTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(SrcProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithSrcAttribute(
        string|null $src,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasSrc;
        };

        $instance = $instance->attributes($attributes)->src($src);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenSrcAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSrc;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingSrcAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSrc;
        };

        self::assertNotSame(
            $instance,
            $instance->src(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(SrcProvider::class, 'values')]
    public function testSetSrcAttributeValue(
        string|null $src,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasSrc;
        };

        $instance = $instance->attributes($attributes)->src($src);

        self::assertSame(
            $expected,
            $instance->getAttributes()['src'] ?? '',
            $message,
        );
    }
}
