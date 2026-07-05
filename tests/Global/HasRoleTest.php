<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Global;

use BackedEnum;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Attribute\Global\HasRole;
use UIAwesome\Html\Attribute\Tests\Provider\Global\RoleProvider;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Role};
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Unit tests for the {@see HasRole} trait managing the `role` global HTML attribute.
 *
 * {@see RoleProvider} for test case data providers.
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
        string|Stringable|UnitEnum|null $role,
        array $attributes,
        string|Stringable|UnitEnum|null $expectedValue,
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
            $instance->getAttribute(GlobalAttribute::ROLE),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionWhenSettingRole(): void
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
                implode("', '", array_map(static fn(BackedEnum $case): string => $case->value, Role::cases())),
            ),
        );

        $instance->role('invalid-value');
    }
}
