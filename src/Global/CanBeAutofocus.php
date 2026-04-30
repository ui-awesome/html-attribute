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
