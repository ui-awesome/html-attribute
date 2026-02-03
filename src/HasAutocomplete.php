<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `autocomplete` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `autocomplete` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `autocomplete` attribute.
 *
 * Key features.
 * - Designed for use in form control elements (input, textarea, select).
 * - Handles the HTML `autocomplete` attribute for autofill functionality.
 * - Immutable method for setting or overriding the `autocomplete` attribute.
 * - Supports `string`, `Stringable`, `UnitEnum`, and `null` for flexible autocomplete assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/autocomplete
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasAutocomplete
{
    /**
     * Sets the HTML `autocomplete` attribute for the element.
     *
     * Creates a new instance with the specified autocomplete value.
     *
     * The `autocomplete` attribute provides a hint to browsers for autofill functionality. It is valid for `<hidden>`,
     * `<text>`, `<search>`, `<url>`, `<tel>`, `<email>`, `<date>`, `<month>`, `<week>`, `<time>`, `<datetime-local>`,
     * `<number>`, `<range>`, `<color>`, and `<password>` input types.
     *
     * It has no effect on `<checkbox>`, `<radio>`, `<file>`, or button types.
     *
     * Common values include:
     * - `on` or `off` to enable/disable autocomplete
     * - `name`, `email`, `tel`, `address-line1` for contact information
     * - `username`, `new-password`, `current-password` for credentials
     * - `organization`, `street-address`, `postal-code` for addresses
     *
     * @param string|Stringable|UnitEnum|null $value Autocomplete value to set for the element. Can be `null` to unset
     * the attribute.
     *
     * @return static New instance with the updated `autocomplete` attribute.
     *
     * Usage example:
     * ```php
     * $element->autocomplete('on');
     * $element->autocomplete('email');
     * $element->autocomplete('new-password');
     * $element->autocomplete(null);
     * ```
     */
    public function autocomplete(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::AUTOCOMPLETE, $value);
    }
}
