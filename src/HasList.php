<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `list` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `list` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `list` attribute.
 *
 * Key features.
 * - Designed for use in input elements to provide autocomplete suggestions.
 * - Handles the HTML `list` attribute for associating a datalist with an input.
 * - Immutable method for setting or overriding the `list` attribute.
 * - Supports `string`, `Stringable`, `UnitEnum`, and `null` for flexible list association.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/list
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasList
{
    /**
     * Sets the HTML `list` attribute for the element.
     *
     * Creates a new instance with the specified list value.
     *
     * The `list` attribute identifies a `<datalist>` element that provides a list of predefined options to suggest to
     * the user. The value must be the `id` of a `<datalist>` element in the same document.
     *
     * It is valid on `<text>`, `<search>`, `<url>`, `<tel>`, `<email>`, `<date>`, `<month>`, `<week>`, `<time>`,
     * `<datetime-local>`, `<number>`, `<range>`, and `<color>` input types.
     *
     * It is not supported by `<hidden>`, `<password>`, `<checkbox>`, `<radio>`, `<file>`, or button types.
     *
     * Values in the datalist that are not compatible with the input's `type` are not included in the suggested options.
     *
     * @param string|Stringable|UnitEnum|null $value List (datalist ID) to associate with the element. Can be `null` to
     * unset the attribute.
     *
     * @return static New instance with the updated `list` attribute.
     *
     * Usage example:
     * ```php
     * $element->list('suggestions');
     * $element->list('countries-list');
     * $element->list(null);
     * ```
     */
    public function list(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::LIST, $value);
    }
}
