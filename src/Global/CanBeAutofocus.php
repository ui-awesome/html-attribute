<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Provides an immutable API for the `autofocus` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/autofocus
 */
trait CanBeAutofocus
{
    /**
     * Sets the `autofocus` attribute.
     *
     * Usage example:
     * ```php
     * $element->autofocus(true);
     * ```
     *
     * @param bool|null $value Whether to enable autofocus. Use `true` to enable, `false` to disable, or `null` to
     * remove the attribute.
     *
     * @return static New instance with the updated `autofocus` attribute.
     */
    public function autofocus(bool|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::AUTOFOCUS, $value);
    }
}
