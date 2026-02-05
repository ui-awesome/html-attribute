<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Provides an immutable API for the `disabled` attribute.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/disabled
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDisabled
{
    /**
     * Sets the `disabled` attribute.
     *
     * @param bool|null $value Disabled state. Use `true` to disable, `false` to enable, or `null` to remove the
     * attribute.
     *
     * @return static New instance with the updated `disabled` attribute.
     *
     * Usage example:
     * ```php
     * $element->disabled(true);
     * $element->disabled(false);
     * $element->disabled(null);
     * ```
     */
    public function disabled(bool|null $value): static
    {
        return $this->addAttribute(Attribute::DISABLED, $value);
    }
}
