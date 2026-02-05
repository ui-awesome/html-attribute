<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Form;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Form\HasAutocomplete;
use UIAwesome\Html\Attribute\Tests\Provider\Form\AutocompleteProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasAutocomplete} trait managing the `autocomplete` HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `autocomplete` attribute is not provided.
 * - Sets the `autocomplete` HTML attribute and renders the expected output.
 * - Verifies invalid `autocomplete` values throw an `InvalidArgumentException`.
 *
 * {@see AutocompleteProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasAutocompleteTest extends TestCase
{
    public function testReturnEmptyWhenAutocompleteAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasAutocomplete;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingAutocompleteAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasAutocomplete;
        };

        self::assertNotSame(
            $instance,
            $instance->autocomplete(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AutocompleteProvider::class, 'values')]
    public function testSetAutocompleteAttributeValue(
        string|Stringable|UnitEnum|null $autocomplete,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasAutocomplete;
        };

        $instance = $instance->attributes($attributes)->autocomplete($autocomplete);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::AUTOCOMPLETE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
