<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Trait for managing the HTML `disabled` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `disabled` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `disabled` attribute.
 *
 * Key features.
 * - Designed for use in form control elements (`<button>`, `<fieldset>`, `<input>`, `<link>`, `<optgroup>`, `<option>`,
 *   `<select>`, and `<textarea>`).
 * - Handles the HTML `disabled` attribute for disabling user interaction.
 * - Immutable method for setting or overriding the `disabled` attribute.
 * - Supports `bool` and `null` for flexible assignment.
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
     * Sets the HTML `disabled` attribute for the element.
     *
     * Creates a new instance with the specified disabled state.
     *
     * The `disabled` attribute is a boolean attribute that indicates the user should not be able to interact with the
     * element. It is valid for all input types and other form controls like select, textarea, and button.
     *
     * When applied to form controls.
     * - Disabled controls are not focusable and do not receive `click` events.
     * - Disabled controls are not submitted with the form.
     * - Disabled controls are typically rendered with a dimmer color or other visual indication.
     * - The value of a disabled control cannot be modified by the user.
     * - When applied to link elements with `rel="stylesheet"`, the stylesheet will not be loaded during page load.
     *
     * Note: Although not required by the specification, some browsers persist the dynamic disabled state across page
     * loads. Use the `autocomplete` attribute to control this feature.
     *
     * @param bool|null $value Disabled state to set for the element. Use `true` to disable, `false` to enable. Can be
     * `null` to unset the attribute.
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
