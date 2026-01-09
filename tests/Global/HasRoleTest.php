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
 * Test suite for {@see HasRole} trait functionality and behavior.
 *
 * Validates the management of the global HTML `role` attribute according to the HTML Living Standard specification.
 *
 * Ensures correct handling, immutability, and validation of the `role` attribute in tag rendering, supporting string,
 * UnitEnum, and `null` for dynamic role assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `role` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `role` attribute.
 * - Proper assignment and overriding of `role` value.
 *
 * {@see RoleProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
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
            $instance->getAttributes()[GlobalAttribute::ROLE->value] ?? '',
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
