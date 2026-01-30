<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Global\HasTitle;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Global\TitleProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasTitle} trait managing the `title` global HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `title` attribute is not provided.
 * - Sets the `title` global HTML attribute and renders the expected output.
 *
 * {@see TitleProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasTitleTest extends TestCase
{
    public function testReturnEmptyWhenTitleAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTitle;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingTitleAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTitle;
        };

        self::assertNotSame(
            $instance,
            $instance->title(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(TitleProvider::class, 'values')]
    public function testSetTitleAttributeValue(
        string|Stringable|UnitEnum|null $title,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasTitle;
        };

        $instance = $instance->attributes($attributes)->title($title);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::TITLE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
