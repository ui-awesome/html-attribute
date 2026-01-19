<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use UIAwesome\Html\Attribute\Values\ElementAttribute;

/**
 * Trait for managing the HTML `src` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `src` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `src` attribute.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `src` attribute.
 * - Immutable method for setting or overriding the `src` attribute.
 * - Supports string and `null` for flexible source assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#src
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSrc
{
    /**
     * Sets the HTML `src` attribute for the element.
     *
     * Creates a new instance with the specified source value, supporting explicit assignment according to the HTML
     * specification for image source attributes.
     *
     * The `src` attribute defines the URL of the image to display in the element. Accepts a string representing a valid
     * URL or path to the image resource. Setting `src` to `null` unsets the attribute.
     *
     * @param string|null $value Image source URL or path to set for the element. Use a valid URL or relative path as a
     * string. Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `src` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/embedded-content.html#attr-img-src
     *
     * Usage example:
     * ```php
     * $element->src('https://example.com/image.png');
     * $element->src('images/photo.jpg');
     * $element->src(null);
     * ```
     */
    public function src(string|null $value): static
    {
        return $this->addAttribute(ElementAttribute::SRC, $value);
    }
}
