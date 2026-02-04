<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Trait for managing the HTML `checked` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `checked` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `checked` attribute.
 *
 * Key features.
 * - Designed for use in form control elements (`<input type="checkbox">` and `<input type="radio">`).
 * - Handles the HTML `checked` attribute for indicating selection state.
 * - Immutable method for setting or overriding the `checked` attribute.
 * - Supports `bool` and `null` for flexible checked state assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/checked
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasChecked
{
    /**
     * Sets the HTML `checked` attribute for the element.
     *
     * Creates a new instance with the specified checked state.
     *
     * The `checked` attribute is a boolean attribute that indicates whether the control is checked.
     * - For radio buttons, only one button in a group with the same `name` can be checked at a time.
     * - When a checkbox or radio button is checked, its `name` and `value` are submitted with the form. If not checked,
     *   the value is not submitted. The default value for checkboxes and radio buttons when checked is `on`.
     *
     * @param bool|null $value Checked state to set for the element. Use `true` to check, `false` to uncheck. Can be
     * `null` to unset the attribute.
     *
     * @return static New instance with the updated `checked` attribute.
     *
     * Usage example:
     * ```php
     * $element->checked(true);
     * $element->checked(false);
     * $element->checked(null);
     * ```
     */
    public function checked(bool|null $value): static
    {
        return $this->addAttribute(Attribute::CHECKED, $value);
    }
}
