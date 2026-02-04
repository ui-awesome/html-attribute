<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Form;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Form\HasStep;
use UIAwesome\Html\Attribute\Tests\Provider\Form\StepProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasStep} trait managing the `step` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `step` attribute is not provided.
 * - Sets the `step` HTML attribute and renders the expected output.
 *
 * {@see StepProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasStepTest extends TestCase
{
    public function testReturnEmptyWhenStepAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStep;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStepAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStep;
        };

        self::assertNotSame(
            $instance,
            $instance->step(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StepProvider::class, 'values')]
    public function testSetStepAttributeValue(
        float|int|string|Stringable|UnitEnum|null $step,
        array $attributes,
        float|int|string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStep;
        };

        $instance = $instance->attributes($attributes)->step($step);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::STEP, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
