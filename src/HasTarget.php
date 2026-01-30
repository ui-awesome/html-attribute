<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, Target};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `target` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `target` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the browsing context target attribute and value
 * validation.
 *
 * Key features.
 * - Designed for use in anchor, area, base, form, and link elements.
 * - Handles the HTML `target` attribute.
 * - Immutable method for setting or overriding the `target` attribute.
 * - Supports string, UnitEnum, and `null` for flexible target assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/target
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasTarget
{
    /**
     * Sets the HTML `target` attribute for the element.
     *
     * Creates a new instance with the specified browsing context target value.
     *
     * Controls where to display the linked resource or where to submit the form.
     * - Use `_self` to open in the same browsing context (default behavior).
     * - Use `_blank` to open in a new tab or window. Always pair with `rel="noopener noreferrer"` for security.
     * - Use `_parent` to open in the parent frame or window.
     * - Use `_top` to open in the full, original window, breaking out of any frames.
     *
     * @param string|UnitEnum|null $value Target browsing context value to set for the element. Use `_self`, `_blank`,
     * `_parent`, `_top`, or other valid browsing context names. Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `target` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/target
     *
     * Usage example:
     * ```php
     * $element->target('_blank');
     * $element->target(Target::BLANK);
     * $element->target(null);
     * ```
     */
    public function target(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Target::cases(), Attribute::TARGET);

        return $this->addAttribute(Attribute::TARGET, $value);
    }
}
