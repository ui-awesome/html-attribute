<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Trait for managing the HTML `multiple` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `multiple` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `multiple` attribute.
 *
 * Key features.
 * - Designed for use in email, file input elements, and select elements.
 * - Handles the HTML `multiple` attribute for allowing multiple values.
 * - Immutable method for setting or overriding the `multiple` attribute.
 * - Supports bool and `null` for flexible multiple state assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Sets the HTML `multiple` attribute for the element.
     *
     * Creates a new instance with the specified multiple state.
     *
     * The `multiple` attribute is a boolean attribute that indicates whether the user can enter or select more than one
     * value.
     *
     * It is valid for `<email>` and `<file>` input types, as well as `<select>` elements.
     * - For `<email>` inputs, when `multiple` is set, the user can enter comma-separated email addresses.
     * - For `<file>` inputs, the user can choose more than one file.
     * - For `<select>` elements, multiple options can be selected.
     *
     * When the `multiple` attribute is set on a `<file>` input, the `accept` attribute can be used to restrict the
     * types of files that can be selected.
     *
     * @param bool|null $value Multiple state to set for the element. Use `true` to allow multiple values, `false` to
     * disallow, or `null` to unset the attribute.
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
        return $this->addAttribute(Attribute::MULTIPLE, $value);
    }
}
