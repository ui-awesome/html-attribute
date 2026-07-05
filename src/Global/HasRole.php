<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Role};
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `role` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Reference/Roles
 */
trait HasRole
{
    /**
     * Sets the `role` attribute.
     *
     * Usage example:
     * ```php
     * $element->role('button');
     * $element->role('navigation');
     * $element->role(Role::ALERT);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value ARIA role, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `role` attribute.
     *
     * {@see Role} for predefined enum values.
     */
    public function role(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Role::cases(), GlobalAttribute::ROLE);

        return $this->addAttribute(GlobalAttribute::ROLE, $value);
    }
}
