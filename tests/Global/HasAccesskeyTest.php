<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Global\HasAccesskey;
use UIAwesome\Html\Attribute\Tests\Provider\Global\AccesskeyProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasAccesskey} trait managing the `accesskey` global HTML attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `accesskey` attribute is not provided.
 * - Sets the `accesskey` global HTML attribute and renders the expected output.
 *
 * {@see AccesskeyProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasAccesskeyTest extends TestCase
{
    public function testReturnEmptyWhenAccesskeyAttributeNotSet(): void
    {
        $instance = new class {
            use HasAccesskey;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingAccesskeyAttribute(): void
    {
        $instance = new class {
            use HasAccesskey;
            use HasAttributes;
        };

        self::assertNotSame(
            $instance,
            $instance->accesskey(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AccesskeyProvider::class, 'values')]
    public function testSetAccesskeyAttributeValue(
        string|Stringable|UnitEnum|null $accesskey,
        array $attributes,
        string|Stringable|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAccesskey;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->accesskey($accesskey);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::ACCESSKEY, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
