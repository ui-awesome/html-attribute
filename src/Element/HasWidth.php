<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UnitEnum;

/**
 * Trait for managing the HTML `width` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `width` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `width` attribute.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `width` attribute.
 * - Immutable method for setting or overriding the `width` attribute.
 * - Supports int, string, and `null` for flexible width assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#width
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/width
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasWidth
{
    /**
     * Sets the HTML `width` attribute for the element.
     *
     * Creates a new instance with the specified width value, supporting explicit assignment according to the HTML
     * specification for element sizing and layout.
     *
     * The `width` attribute defines the horizontal dimension of the element's content area. Accepts integer values
     * (interpreted as CSS pixels) or strings with valid CSS units (for example, `px`, `em`, `%`, `auto`).
     *
     * @param int|string|null $value Width value to set for the element. Use an integer for pixel values or a string for
     * CSS units (for example, `100%`, `auto`, `10em`). Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `width` attribute.
     *
     * @link https://drafts.csswg.org/css-sizing-3/#propdef-width
     * @link https://html.spec.whatwg.org/multipage/embedded-content-other.html#attr-dim-width
     *
     * Usage example:
     * ```php
     * $element->width(400);
     * $element->width('50%');
     * $element->width('auto');
     * $element->width(null);
     * ```
     */
    public function width(int|string|null $value): static
    {
        return $this->addAttribute(ElementAttribute::WIDTH, $value);
    }
}
