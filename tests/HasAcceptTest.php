<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\HasAccept;
use UIAwesome\Html\Attribute\Tests\Support\Provider\AcceptProvider;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasAccept} trait managing the `accept` HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `accept` attribute is not provided.
 * - Sets the `accept` HTML attribute and renders the expected output.
 *
 * {@see AcceptProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasAcceptTest extends TestCase
{
    public function testReturnEmptyWhenAcceptAttributeNotSet(): void
    {
        $instance = new class {
            use HasAccept;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingAcceptAttribute(): void
    {
        $instance = new class {
            use HasAccept;
            use HasAttributes;
        };

        self::assertNotSame(
            $instance,
            $instance->accept(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AcceptProvider::class, 'values')]
    public function testSetAcceptAttributeValue(
        string|Stringable|UnitEnum|null $accept,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttributes,
        string $message,
    ): void {
        $instance = new class {
            use HasAccept;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->accept($accept);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(Attribute::ACCEPT, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttributes,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
