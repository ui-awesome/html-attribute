<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use UIAwesome\Html\Attribute\Values\GlobalAttribute;

/**
 * Provides an immutable API for the `hidden` attribute.
 *
 * @method static setAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/hidden
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait CanBeHidden
{
    /**
     * Sets the `hidden` attribute.
     *
     * @param bool $value Whether to hide the element. Use `true` to hide and `false` to show.
     *
     * @return static New instance with the updated `hidden` attribute.
     *
     * Usage example:
     * ```php
     * $element->hidden(true);
     * $element->hidden(false);
     * ```
     */
    public function hidden(bool $value): static
    {
        return $this->setAttribute(GlobalAttribute::HIDDEN, $value);
    }
}
