<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Provides an immutable API for the `disabled` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/disabled
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
