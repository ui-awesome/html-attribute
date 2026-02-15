<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Provides an immutable API for the `multiple` attribute.
 *
 * @method static setAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/multiple
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMultiple
{
    /**
     * Sets the `multiple` attribute.
     *
     * @param bool|null $value Multiple state. Use `true` to allow multiple values, `false` to disallow, or `null` to
     * remove the attribute.
     *
     * @return static New instance with the updated `multiple` attribute.
     *
     * Usage example:
     * ```php
     * $element->multiple(true);
     * $element->multiple(false);
     * $element->multiple(null);
     * ```
     */
    public function multiple(bool|null $value): static
    {
        return $this->setAttribute(Attribute::MULTIPLE, $value);
    }
}
