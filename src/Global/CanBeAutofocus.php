<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use UIAwesome\Html\Attribute\Values\GlobalAttribute;

/**
 * Provides an immutable API for the `autofocus` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
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
     * Usage example:
     * ```php
     * $element->autofocus(true);
     * ```
     *
     * @param bool $value Whether to enable autofocus. Use `true` to enable and `false` to disable.
     *
     * @return static New instance with the updated `autofocus` attribute.
     */
    public function autofocus(bool $value): static
    {
        return $this->setAttribute(GlobalAttribute::AUTOFOCUS, $value);
    }
}
