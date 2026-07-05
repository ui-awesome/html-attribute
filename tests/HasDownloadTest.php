<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasDownload;
use UIAwesome\Html\Attribute\Tests\Provider\DownloadProvider;
use UIAwesome\Html\Attribute\Values\{Attribute, ElementAttribute};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasDownload} trait managing the `download` HTML attribute.
 *
 * {@see DownloadProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasDownloadTest extends TestCase
{
    public function testReturnEmptyWhenDownloadAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDownload;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingDownloadAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDownload;
        };

        self::assertNotSame(
            $instance,
            $instance->download(true),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DownloadProvider::class, 'values')]
    public function testSetDownloadAttributeValue(
        bool|string|Stringable|UnitEnum|null $download,
        array $attributes,
        bool|string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasDownload;
        };

        $instance = $instance->attributes($attributes)->download($download);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(ElementAttribute::DOWNLOAD),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
