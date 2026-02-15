<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the `popovertarget` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/popovertarget
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPopoverTarget
{
    /**
     * Sets the `popovertarget` attribute.
     *
     * Usage example:
     * ```php
     * $element->popoverTarget('popover-id');
     * $element->popoverTarget($targetId);
     * $element->popoverTarget(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Popover target ID, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `popovertarget` attribute.
     */
    public function popoverTarget(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(ElementAttribute::POPOVERTARGET, $value);
    }
}
