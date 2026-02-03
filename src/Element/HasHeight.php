<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UnitEnum;

/**
 * Trait for managing the HTML `height` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `height` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `height` attribute.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `height` attribute.
 * - Immutable method for setting or overriding the `height` attribute.
 * - Supports `int`, `string`, `Stringable`, `UnitEnum`, and `null` for flexible height assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#height
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/height
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasHeight
{
    /**
     * Sets the HTML `height` attribute for the element.
     *
     * Creates a new instance with the specified height value, supporting explicit assignment according to the HTML and
     * CSS specification for element sizing.
     *
     * The `height` attribute defines the vertical dimension of the element's content area. Accepts integer values
     * (interpreted as pixels) or strings with valid CSS units (for example, `px`, `em`, `%`, `auto`).
     *
     * @param int|string|Stringable|UnitEnum|null $value Height value to set for the element. Use an integer for pixel
     * values or a string for CSS units (for example, `100%`, `auto`, `10em`). Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `height` attribute.
     *
     * @link https://drafts.csswg.org/css-sizing-3/#propdef-height
     * @link https://html.spec.whatwg.org/multipage/embedded-content-other.html#attr-dim-height
     *
     * Usage example:
     * ```php
     * $element->height(200);
     * $element->height('50%');
     * $element->height('auto');
     * ```
     */
    public function height(int|string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(ElementAttribute::HEIGHT, $value);
    }
}
