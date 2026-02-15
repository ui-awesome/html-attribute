<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Global\HasClass;
use UIAwesome\Html\Attribute\Tests\Provider\Global\ClassProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasClass} trait managing the `class` global HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `class` attribute is not provided.
 * - Sets the `class` global HTML attribute and renders the expected output.
 *
 * {@see ClassProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasClassTest extends TestCase
{
    public function testReturnEmptyWhenClassAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasClass;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingClassAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasClass;
        };

        self::assertNotSame(
            $instance,
            $instance->class(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param array<array{value: string|Stringable|UnitEnum|null, override?: bool}> $operations
     */
    #[DataProviderExternal(ClassProvider::class, 'values')]
    public function testSetClassAttributeValue(
        array $operations,
        string|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasClass;
        };

        foreach ($operations as $operation) {
            $override = $operation['override'] ?? null;

            $instance = match ($override) {
                true => $instance->class($operation['value'], true),
                default => $instance->class($operation['value']),
            };
        }

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::CLASS_CSS, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
