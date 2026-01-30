<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Global\HasRole;
use UIAwesome\Html\Attribute\Tests\Support\Provider\Global\RoleProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Role};
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasRole} trait managing the `role` global HTML attribute.
 *
 * Verifies rendered output, immutability, attribute override, and validation behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `role` attribute is not provided.
 * - Sets the `role` global HTML attribute and renders the expected output.
 * - Throws an exception when the `role` attribute value is invalid.
 *
 * {@see RoleProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('global')]
final class HasRoleTest extends TestCase
{
    public function testReturnEmptyWhenRoleAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRole;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingRoleAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRole;
        };

        self::assertNotSame(
            $instance,
            $instance->role(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RoleProvider::class, 'values')]
    public function testSetRoleAttributeValue(
        string|UnitEnum|null $role,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasRole;
        };

        $instance = $instance->attributes($attributes)->role($role);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(GlobalAttribute::ROLE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidRoleValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRole;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                GlobalAttribute::ROLE->value,
                implode('\', \'', Enum::normalizeArray(Role::cases())),
            ),
        );

        $instance->role('invalid-value');
    }
}
