<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasContent;
use UIAwesome\Html\Attribute\Tests\Support\Provider\ContentProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasContent} trait managing the `content` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `content` attribute is not provided.
 * - Sets the `content` HTML attribute and renders the expected output.
 *
 * {@see ContentProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
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
        string|Stringable|UnitEnum $expectedValue,
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
            $instance->getAttribute(Attribute::CONTENT, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
