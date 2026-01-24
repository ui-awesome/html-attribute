<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UnitEnum;

/**
 * Trait for managing the HTML `alt` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `alt` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `alt` attribute.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `alt` attribute.
 * - Immutable method for setting or overriding the `alt` attribute.
 * - Supports string and `null` for flexible alternative text assignment.
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#alt
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasAlt
{
    /**
     * Sets the HTML `alt` attribute for the element.
     *
     * Creates a new instance with the specified alternative text value, supporting explicit assignment according to the
     * HTML specification for image alternative text.
     *
     * The `alt` attribute provides a textual replacement for the image, which is essential for accessibility and is
     * displayed if the image cannot be loaded. Setting `alt` to an empty string (`''`) indicates the image is
     * decorative.
     *
     * @param string|null $value Alternative text to set for the element. Use a concise description of the image's
     * content or purpose. Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `alt` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-alt
     *
     * Usage example:
     * ```php
     * $element->alt('A penguin on a beach.');
     * $element->alt('');
     * $element->alt(null);
     * ```
     */
    public function alt(string|null $value): static
    {
        return $this->addAttribute(ElementAttribute::ALT, $value);
    }
}
