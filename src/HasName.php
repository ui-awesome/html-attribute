<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `name` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `name` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `name` attribute.
 *
 * Key features.
 * - Designed for elements that support `name` (`<button>`, `<fieldset>`, `<form>`, `<iframe>`, `<input>`, `<map>`,
 *   `<meta>`, `<object>`, `<output>`, `<param>`, `<select>`, `<textarea>`).
 * - Handles the HTML `name` attribute.
 * - Immutable method for setting or overriding the `name` attribute.
 * - Supports `string`, `Stringable`, `UnitEnum`, and `null` for flexible name assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/name
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasName
{
    /**
     * Sets the HTML `name` attribute for the element.
     *
     * Creates a new instance with the specified `name` value.
     *
     * @param string|Stringable|UnitEnum|null $value Name value to set for the element. Can be `null` to unset the
     * attribute.
     *
     * @return static New instance with the updated `name` attribute.
     *
     * {@see \UIAwesome\Html\Attribute\Values\MetaName} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->name('viewport');
     * $element->name(MetaName::VIEWPORT);
     * $element->name(null);
     * ```
     */
    public function name(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::NAME, $value);
    }
}
