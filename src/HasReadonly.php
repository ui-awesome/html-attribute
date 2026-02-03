<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Trait for managing the HTML `readonly` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `readonly` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `readonly` attribute.
 *
 * Key features.
 * - Designed for use in form control elements (input, textarea).
 * - Handles the HTML `readonly` attribute for preventing user editing.
 * - Immutable method for setting or overriding the `readonly` attribute.
 * - Supports bool and `null` for flexible readonly state assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Sets the HTML `readonly` attribute for the element.
     *
     * Creates a new instance with the specified readonly state.
     *
     * The `readonly` attribute is a boolean attribute that indicates the user should not be able to edit the value of
     * the input. Unlike `disabled`, a readonly input is still focusable, can be tabbed to, and its value is submitted
     * with the form.
     *
     * It is supported by text, search, url, tel, email, date, month, week, time, datetime-local, number, and password
     * input types, as well as textarea. It is not applicable to hidden, range, color, checkbox, radio, or button types.
     *
     * The user can still select and copy text from a readonly field, but cannot modify it.
     *
     * @param bool|null $value Readonly state to set for the element. Use `true` to make readonly, `false` to make
     * editable. Can be `null` to unset the attribute.
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
        return $this->addAttribute(Attribute::READONLY, $value);
    }
}
