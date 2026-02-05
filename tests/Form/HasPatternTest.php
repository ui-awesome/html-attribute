<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Form;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Form\HasPattern;
use UIAwesome\Html\Attribute\Tests\Provider\Form\PatternProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasPattern} trait managing the `pattern` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `pattern` attribute is not provided.
 * - Sets the `pattern` HTML attribute and renders the expected output.
 *
 * {@see PatternProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasPatternTest extends TestCase
{
    public function testReturnEmptyWhenPatternAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPattern;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingPatternAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPattern;
        };

        self::assertNotSame(
            $instance,
            $instance->pattern(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(PatternProvider::class, 'values')]
    public function testSetPatternAttributeValue(
        string|Stringable|UnitEnum|null $pattern,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasPattern;
        };

        $instance = $instance->attributes($attributes)->pattern($pattern);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::PATTERN, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
