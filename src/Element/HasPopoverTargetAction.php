<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, PopoverTargetAction};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `popovertargetaction` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#popovertargetaction
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPopoverTargetAction
{
    /**
     * Sets the `popovertargetaction` attribute.
     *
     * Usage example:
     * ```php
     * $element->popoverTargetAction('toggle');
     * $element->popoverTargetAction($action);
     * $element->popoverTargetAction(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Popover target action (`hide`, `show`, `toggle`), or `null` to
     * remove the attribute.
     *
     * @throws InvalidArgumentException If the provided value is not valid.
     *
     * @return static New instance with the updated `popovertargetaction` attribute.
     */
    public function popoverTargetAction(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, PopoverTargetAction::cases(), ElementAttribute::POPOVERTARGETACTION);

        return $this->setAttribute(ElementAttribute::POPOVERTARGETACTION, $value);
    }
}
