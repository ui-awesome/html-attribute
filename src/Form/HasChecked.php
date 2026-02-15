<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Provides an immutable API for the `checked` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/checked
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasChecked
{
    /**
     * Sets the `checked` attribute.
     *
     * Usage example:
     * ```php
     * $element->checked(true);
     * $element->checked(false);
     * $element->checked(null);
     * ```
     *
     * @param bool|null $value Checked state. Use `true` to check, `false` to uncheck, or `null` to remove the
     * attribute.
     *
     * @return static New instance with the updated `checked` attribute.
     */
    public function checked(bool|null $value): static
    {
        return $this->setAttribute(Attribute::CHECKED, $value);
    }
}
