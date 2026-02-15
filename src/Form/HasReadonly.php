<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Provides an immutable API for the `readonly` attribute.
 *
 * @method static setAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/readonly
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasReadonly
{
    /**
     * Sets the `readonly` attribute.
     *
     * @param bool|null $value Readonly state. Use `true` to make readonly, `false` to make editable, or `null` to
     * remove the attribute.
     *
     * @return static New instance with the updated `readonly` attribute.
     *
     * Usage example:
     * ```php
     * $element->readonly(true);
     * $element->readonly(false);
     * $element->readonly(null);
     * ```
     */
    public function readonly(bool|null $value): static
    {
        return $this->setAttribute(Attribute::READONLY, $value);
    }
}
