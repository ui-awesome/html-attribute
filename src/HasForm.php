<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `form` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `form` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `form` attribute.
 *
 * Key features.
 * - Designed for use in form control elements (input, textarea, select, button).
 * - Handles the HTML `form` attribute for associating controls with forms.
 * - Immutable method for setting or overriding the `form` attribute.
 * - Supports string, Stringable, UnitEnum, and `null` for flexible form association.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/form
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasForm
{
    /**
     * Sets the HTML `form` attribute for the element.
     *
     * Creates a new instance with the specified form value.
     *
     * The `form` attribute associates the control with a form element by referencing the form's `id`. This allows form
     * controls to be placed anywhere in the document while still being submitted with the specified form. If this
     * attribute is not specified, the control is associated with the nearest containing form, if any.
     *
     * The value must match the `id` of a `<form>` element in the same document. An input can only be associated with
     * one form.
     *
     * @param string|Stringable|UnitEnum|null $value Form ID to associate with the element. Can be `null` to unset the
     * attribute.
     *
     * @return static New instance with the updated `form` attribute.
     *
     * Usage example:
     * ```php
     * $element->form('myForm');
     * $element->form($formId);
     * $element->form(null);
     * ```
     */
    public function form(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::FORM, $value);
    }
}
