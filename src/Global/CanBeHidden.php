<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use UIAwesome\Html\Attribute\Values\GlobalAttribute;

/**
 * Provides an immutable API for the `hidden` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
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
     * Usage example:
     * ```php
     * $element->hidden(true);
     * $element->hidden(false);
     * ```
     *
     * @param bool|null $value Whether to hide the element. Use `true` to hide, `false` to show, or `null` to remove the
     * attribute.
     *
     * @return static New instance with the updated `hidden` attribute.
     */
    public function hidden(bool|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::HIDDEN, $value);
    }
}
