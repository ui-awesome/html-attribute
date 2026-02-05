<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use UIAwesome\Html\Attribute\Values\GlobalAttribute;

/**
 * Provides an immutable API for the `autofocus` attribute.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/autofocus
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait CanBeAutofocus
{
    /**
     * Sets the `autofocus` attribute.
     *
     * @param bool $value Whether to enable autofocus. Use `true` to enable and `false` to disable.
     *
     * @return static New instance with the updated `autofocus` attribute.
     *
     * Usage example:
     * ```php
     * $element->autofocus(true);
     * $element->autofocus(false);
     * ```
     */
    public function autofocus(bool $value): static
    {
        return $this->addAttribute(GlobalAttribute::AUTOFOCUS, $value);
    }
}
