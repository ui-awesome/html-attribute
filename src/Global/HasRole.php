<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Role};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `role` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Reference/Roles
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRole
{
    /**
     * Sets the `role` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value ARIA role, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `role` attribute.
     *
     * {@see Role} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->role('button');
     * $element->role('navigation');
     * $element->role(Role::ALERT);
     * ```
     */
    public function role(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Role::cases(), GlobalAttribute::ROLE);

        return $this->setAttribute(GlobalAttribute::ROLE, $value);
    }
}
