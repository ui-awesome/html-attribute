<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasContent;
use UIAwesome\Html\Attribute\Tests\Provider\ContentProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasContent} trait managing the `content` HTML attribute.
 *
 * {@see ContentProvider} for test case data providers.
 */
#[Group('attribute')]
final class HasContentTest extends TestCase
{
    public function testReturnEmptyWhenContentAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasContent;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingContentAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasContent;
        };

        self::assertNotSame(
            $instance,
            $instance->content(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ContentProvider::class, 'values')]
    public function testSetContentAttributeValue(
        string|Stringable|UnitEnum|null $content,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasContent;
        };

        $instance = $instance->attributes($attributes)->content($content);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::CONTENT),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
