<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasSpellcheck;
use UIAwesome\Html\Attribute\Tests\Provider\Global\SpellcheckProvider;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Unit tests for the {@see HasSpellcheck} trait managing the `spellcheck` global HTML attribute.
 *
 * {@see SpellcheckProvider} for test case data providers.
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
        bool|string|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasSpellcheck;
        };

        $instance = $instance->attributes($attributes)->spellcheck($spellcheck);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::SPELLCHECK),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingSpellcheck(): void
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
                implode("', '", ['false', 'true']),
            ),
        );

        $instance->spellcheck('invalid-value');
    }
}
