<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\CanBeAutofocus;
use UIAwesome\Html\Attribute\Tests\Provider\Global\AutofocusProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see CanBeAutofocus} trait managing the `autofocus` global HTML attribute.
 *
 * {@see AutofocusProvider} for test case data providers.
 */
#[Group('global')]
final class CanBeAutofocusTest extends TestCase
{
    public function testReturnEmptyWhenAutofocusAttributeNotSet(): void
    {
        $instance = new class {
            use CanBeAutofocus;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingAutofocusAttribute(): void
    {
        $instance = new class {
            use CanBeAutofocus;
            use HasAttributes;
        };

        self::assertNotSame(
            $instance,
            $instance->autofocus(true),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AutofocusProvider::class, 'values')]
    public function testSetAutofocusAttributeValue(
        bool|null $value,
        array $attributes,
        bool|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use CanBeAutofocus;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->autofocus($value);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::AUTOFOCUS),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
