<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Provides an immutable API for the `selected` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/option#selected
 */
trait CanBeSelected
{
    /**
     * Sets the `selected` attribute.
     *
     * Usage example:
     * ```php
     * $element->selected(true);
     * $element->selected(null);
     * ```
     *
     * @param bool|null $value Selected state. Use `true` to mark selected, `false` to unselect, or `null` to remove
     * the attribute.
     *
     * @return static New instance with the updated `selected` attribute.
     */
    public function selected(bool|null $value): static
    {
        return $this->addAttribute(ElementAttribute::SELECTED, $value);
    }
}
