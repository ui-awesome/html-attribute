<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasContentEditable;
use UIAwesome\Html\Attribute\Tests\Provider\Global\ContentEditableProvider;
use UIAwesome\Html\Attribute\Values\{ContentEditable, GlobalAttribute};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasContentEditable} trait managing the `contenteditable` global HTML attribute.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `contenteditable` attribute is not provided.
 * - Sets the `contenteditable` global HTML attribute and renders the expected output.
 * - Verifies invalid `contenteditable` values throw an `InvalidArgumentException`.
 *
 * {@see ContentEditableProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasContentEditableTest extends TestCase
{
    public function testReturnEmptyWhenContentEditableAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasContentEditable;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingContentEditableAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasContentEditable;
        };

        self::assertNotSame(
            $instance,
            $instance->contentEditable(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ContentEditableProvider::class, 'values')]
    public function testSetContentEditableAttributeValue(
        bool|string|UnitEnum|null $contenteditable,
        array $attributes,
        bool|string|UnitEnum|null $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasContentEditable;
        };

        $instance = $instance->attributes($attributes)->contentEditable($contenteditable);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::CONTENTEDITABLE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingContentEditable(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasContentEditable;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                GlobalAttribute::CONTENTEDITABLE->value,
                implode("', '", Enum::normalizeArray(ContentEditable::cases())),
            ),
        );

        $instance->contentEditable('invalid-value');
    }
}
