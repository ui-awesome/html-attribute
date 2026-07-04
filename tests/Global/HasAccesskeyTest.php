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
 * {@see AccesskeyProvider} for test case data providers.
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
        string|Stringable|UnitEnum|null $expectedValue,
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
            $instance->getAttribute(GlobalAttribute::ACCESSKEY),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
