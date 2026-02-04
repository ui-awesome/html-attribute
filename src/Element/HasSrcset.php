<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use Stringable;
use UnitEnum;

/**
 * Trait for managing the HTML `srcset` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `srcset` attribute on HTML elements.
 *
 * Intended for use in tag elements that require manipulation of the `srcset` attribute.
 *
 * Key features.
 * - Designed for use in tag elements (`<img>`, `<picture>`, `<source>`).
 * - Handles the HTML `srcset` attribute.
 * - Immutable method for setting or overriding the `srcset` attribute.
 * - Supports `string`, `Stringable`, `UnitEnum`, and `null` for flexible source set assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#srcset
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/picture#the_srcset_attribute
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/source#srcset
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSrcset
{
    /**
     * Sets the HTML `srcset` attribute for the element.
     *
     * Creates a new instance with the specified source set value, supporting explicit assignment according to the HTML
     * specification for responsive images.
     *
     * The `srcset` attribute defines a set of images for the browser to choose from, along with information about the
     * sizes of each image.
     * - The browser selects the most appropriate image based on the current viewport size, pixel density, and other
     *   factors.
     * - Each image in the set is specified with a URL and either a width descriptor ('w') or pixel density descriptor
     *   ('x').
     *
     * @param string|Stringable|UnitEnum|null $value Source set descriptor to set for the element. Use comma-separated
     * image URLs with size descriptors (for example, "small.jpg 480w, medium.jpg 800w, large.jpg 1200w"). Can be `null`
     * to unset the attribute.
     *
     * @return static New instance with the updated `srcset` attribute.
     *
     * Usage example:
     * ```php
     * $element->srcset('small.jpg 480w, medium.jpg 800w, large.jpg 1200w');
     * $element->srcset('image-1x.jpg 1x, image-2x.jpg 2x');
     * $element->srcset(null);
     * ```
     */
    public function srcset(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute('srcset', $value);
    }
}
