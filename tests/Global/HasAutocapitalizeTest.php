<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasAutocapitalize;
use UIAwesome\Html\Attribute\Tests\Provider\Global\AutocapitalizeProvider;
use UIAwesome\Html\Attribute\Values\{Autocapitalize, GlobalAttribute};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasAutocapitalize} trait managing the `autocapitalize` global HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `autocapitalize` attribute is not provided.
 * - Sets the `autocapitalize` global HTML attribute and renders the expected output.
 * - Verifies invalid `autocapitalize` values throw an `InvalidArgumentException`.
 *
 * {@see AutocapitalizeProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasAutocapitalizeTest extends TestCase
{
    public function testReturnEmptyWhenAutocapitalizeAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasAutocapitalize;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingAutocapitalizeAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasAutocapitalize;
        };

        self::assertNotSame(
            $instance,
            $instance->autocapitalize(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AutocapitalizeProvider::class, 'values')]
    public function testSetAutocapitalizeAttributeValue(
        string|UnitEnum|null $autocapitalize,
        array $attributes,
        string|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasAutocapitalize;
        };

        $instance = $instance->attributes($attributes)->autocapitalize($autocapitalize);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::AUTOCAPITALIZE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingAutocapitalize(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasAutocapitalize;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                GlobalAttribute::AUTOCAPITALIZE->value,
                implode("', '", Enum::normalizeArray(Autocapitalize::cases())),
            ),
        );

        $instance->autocapitalize('invalid-value');
    }
}
