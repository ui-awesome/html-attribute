<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\HasForm;
use UIAwesome\Html\Attribute\Tests\Support\Provider\FormProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see HasForm} trait managing the `form` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `form` attribute is not provided.
 * - Sets the `form` HTML attribute and renders the expected output.
 *
 * {@see FormProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFormTest extends TestCase
{
    public function testReturnEmptyWhenFormAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasForm;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingFormAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasForm;
        };

        self::assertNotSame(
            $instance,
            $instance->form(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FormProvider::class, 'values')]
    public function testSetFormAttributeValue(
        string|null $form,
        array $attributes,
        string|null $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasForm;
        };

        $instance = $instance->attributes($attributes)->form($form);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::FORM, null),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
