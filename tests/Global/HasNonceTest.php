<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Global\HasNonce;
use UIAwesome\Html\Attribute\Tests\Provider\Global\NonceProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasNonce} trait managing the `nonce` global HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `nonce` attribute is not provided.
 * - Sets the `nonce` global HTML attribute and renders the expected output.
 *
 * {@see NonceProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasNonceTest extends TestCase
{
    public function testReturnEmptyWhenNonceAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasNonce;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingNonceAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasNonce;
        };

        self::assertNotSame(
            $instance,
            $instance->nonce(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(NonceProvider::class, 'values')]
    public function testSetNonceAttributeValue(
        string|Stringable|UnitEnum|null $nonce,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasNonce;
        };

        $instance = $instance->attributes($attributes)->nonce($nonce);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::NONCE),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
