<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasSpellcheck;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Global\SpellcheckProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Test suite for {@see HasSpellcheck} trait functionality and behavior.
 *
 * Validates the management of the global HTML `spellcheck` attribute according to the HTML Living Standard
 * specification.
 *
 * Ensures correct handling, immutability, and validation of the `spellcheck` attribute in tag rendering, supporting
 * bool, string, and `null` for dynamic spellcheck state assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `spellcheck` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `spellcheck` attribute.
 * - Proper assignment and overriding of `spellcheck` value.
 *
 * {@see SpellcheckProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasSpellcheckTest extends TestCase
{
    public function testReturnEmptyWhenSpellcheckAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSpellcheck;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingSpellcheckAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSpellcheck;
        };

        self::assertNotSame(
            $instance,
            $instance->spellcheck(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(SpellcheckProvider::class, 'values')]
    public function testSetSpellcheckAttributeValue(
        bool|string|null $spellcheck,
        array $attributes,
        bool|string $expectedValue,
        string $expectedReanderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasSpellcheck;
        };

        $instance = $instance->attributes($attributes)->spellcheck($spellcheck);

        self::assertSame(
            $expectedValue,
            $instance->getAttributes()[GlobalAttribute::SPELLCHECK->value] ?? '',
            $message,
        );
        self::assertSame(
            $expectedReanderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidSpellcheckValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSpellcheck;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                GlobalAttribute::SPELLCHECK->value,
                implode('\', \'', ['false', 'true']),
            ),
        );

        $instance->spellcheck('invalid-value');
    }
}
