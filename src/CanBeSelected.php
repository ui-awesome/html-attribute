<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Provides an immutable API for the `selected` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/option#selected
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
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
        return $this->setAttribute(Attribute::SELECTED, $value);
    }
}
