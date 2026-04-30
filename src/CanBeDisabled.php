<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Provides an immutable API for the `disabled` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/disabled
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait CanBeDisabled
{
    /**
     * Sets the `disabled` attribute.
     *
     * Usage example:
     * ```php
     * $element->disabled(true);
     * $element->disabled(null);
     * ```
     *
     * @param bool|null $value Disabled state. Use `true` to disable, `false` to enable, or `null` to remove the
     * attribute.
     *
     * @return static New instance with the updated `disabled` attribute.
     */
    public function disabled(bool|null $value): static
    {
        return $this->addAttribute(Attribute::DISABLED, $value);
    }
}
