<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Popover};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `popover` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/popover
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPopover
{
    /**
     * Sets the `popover` attribute.
     *
     * Usage example:
     * ```php
     * $element->popover('manual');
     * $element->popover(Popover::AUTO);
     * ```
     *
     * @param string|UnitEnum|null $value Popover state. Use `auto` for auto behavior, `manual` to remove,
     * `auto`/`manual` or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the provided value is not valid.
     *
     * @return static New instance with the updated `popover` attribute.
     *
     * {@see Popover} for predefined enum values.
     */
    public function popover(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Popover::cases(), GlobalAttribute::POPOVER);

        return $this->addAttribute(GlobalAttribute::POPOVER, $value);
    }
}
