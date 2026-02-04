<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `placeholder` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `placeholder` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `placeholder` attribute.
 *
 * Key features.
 * - Designed for use in text input and textarea elements.
 * - Handles the HTML `placeholder` attribute for displaying hint text.
 * - Immutable method for setting or overriding the `placeholder` attribute.
 * - Supports `string`, `Stringable`, `UnitEnum`, and `null` for flexible placeholder assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/placeholder
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPlaceholder
{
    /**
     * Sets the HTML `placeholder` attribute for the element.
     *
     * Creates a new instance with the specified placeholder value.
     *
     * The `placeholder` attribute provides a brief hint to the user as to what kind of information is expected in the
     * field. It should be a word or short phrase that provides a hint as to the expected type of data, rather than an
     * explanation or prompt. The text must not include carriage returns or line feeds.
     *
     * It is valid for `<input type="text">`, `<input type="search">`, `<input type="url">`, `<input type="tel">`,
     * `<input type="email">`, `<input type="password">`, and `<input type="number">` input types, as well as
     * `<textarea>`.
     *
     * The placeholder text is displayed when the field has no value and disappears when the user enters text or the
     * field has a value.
     *
     * Note: The `placeholder` attribute is not as semantically useful as a `<label>` element and should not be used as
     * a replacement for labels. Use labels to describe the purpose of the form control.
     *
     * @param string|Stringable|UnitEnum|null $value Placeholder text to set for the element. Can be `null` to unset the
     * attribute.
     *
     * @return static New instance with the updated `placeholder` attribute.
     *
     * Usage example:
     * ```php
     * $element->placeholder('Enter your email');
     * $element->placeholder('e.g., John Doe');
     * $element->placeholder(null);
     * ```
     */
    public function placeholder(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::PLACEHOLDER, $value);
    }
}
