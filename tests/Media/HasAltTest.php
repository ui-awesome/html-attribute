<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Media;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Media\HasAlt;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Media\AltProvider;
use UIAwesome\Html\Attribute\Tests\Support\Stub\HasAttributes;
use UIAwesome\Html\Helper\Attributes;

#[Group('media')]
final class HasAltTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AltProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithAltAttribute(
        string|null $alt,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAlt;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->alt($alt);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenAltAttributeNotSet(): void
    {
        $instance = new class {
            use HasAlt;
            use HasAttributes;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingAltAttribute(): void
    {
        $instance = new class {
            use HasAlt;
            use HasAttributes;
        };

        self::assertNotSame(
            $instance,
            $instance->alt(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(AltProvider::class, 'values')]
    public function testSetAltAttributeValue(
        string|null $alt,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAlt;
            use HasAttributes;
        };

        $instance = $instance->attributes($attributes)->alt($alt);

        self::assertSame(
            $expected,
            $instance->getAttributes()['alt'] ?? '',
            $message,
        );
    }
}
