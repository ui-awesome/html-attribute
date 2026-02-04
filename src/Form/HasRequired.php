<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Trait for managing the HTML `required` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `required` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `required` attribute.
 *
 * Key features.
 * - Designed for use in form control elements (`<input>`, `<select>`, `<textarea>`).
 * - Handles the HTML `required` attribute for mandatory field validation.
 * - Immutable method for setting or overriding the `required` attribute.
 * - Supports `bool` and `null` for flexible required state assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/required
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRequired
{
    /**
     * Sets the HTML `required` attribute for the element.
     *
     * Creates a new instance with the specified required state.
     *
     * The `required` attribute is a boolean attribute that indicates the user must specify a value for the input before
     * the owning form can be submitted.
     * - If the field has no value or an invalid value, constraint validation will prevent form submission and the
     *   browser will display an error message.
     * - It is not valid for `<button>`, `<input type="color">`, `<input type="hidden">`, and `<input type="range">`.
     * - For checkboxes, the checkbox must be checked.
     * - For radio buttons, one radio button in the group must be selected.
     * - For file inputs, a file must be selected.
     * - For other types, a non-empty value must be entered.
     *
     * @param bool|null $value Required state to set for the element. Use `true` to require a value, `false` to make it
     * optional. Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `required` attribute.
     *
     * Usage example:
     * ```php
     * $element->required(true);
     * $element->required(false);
     * $element->required(null);
     * ```
     */
    public function required(bool|null $value): static
    {
        return $this->addAttribute(Attribute::REQUIRED, $value);
    }
}
