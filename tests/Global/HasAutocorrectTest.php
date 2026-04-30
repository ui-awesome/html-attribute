<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasAutocorrect;
use UIAwesome\Html\Attribute\Tests\Provider\Global\AutocorrectProvider;
use UIAwesome\Html\Attribute\Values\{Autocorrect, GlobalAttribute};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasAutocorrect} trait managing the `autocorrect` global HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `autocorrect` attribute is not provided.
 * - Sets the `autocorrect` global HTML attribute and renders the expected output.
 * - Verifies invalid `autocorrect` values throw an `InvalidArgumentException`.
 *
 * {@see AutocorrectProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasAutocorrectTest extends TestCase
{
    public function testReturnEmptyWhenAutocorrectAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasAutocorrect;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingAutocorrectAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasAutocorrect;
        };

        self::assertNotSame(
            $instance,
            $instance->autocorrect(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AutocorrectProvider::class, 'values')]
    public function testSetAutocorrectAttributeValue(
        string|UnitEnum|null $autocorrect,
        array $attributes,
        string|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasAutocorrect;
        };

        $instance = $instance->attributes($attributes)->autocorrect($autocorrect);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::AUTOCORRECT),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingAutocorrect(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasAutocorrect;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                GlobalAttribute::AUTOCORRECT->value,
                implode("', '", array_map(static fn(\BackedEnum $case): string => $case->value, Autocorrect::cases())),
            ),
        );

        $instance->autocorrect('invalid-value');
    }
}
