<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `imagesrcset` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `imagesrcset` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `imagesrcset` attribute.
 *
 * Key features.
 * - Designed for use in link elements with `rel="preload"` and `as="image"`.
 * - Handles the HTML `imagesrcset` attribute.
 * - Immutable method for setting or overriding the `imagesrcset` attribute.
 * - Supports string, Stringable, UnitEnum, and `null` for flexible assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#imagesrcset
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasImagesrcset
{
    /**
     * Sets the HTML `imagesrcset` attribute for the element.
     *
     * Creates a new instance with the specified image srcset value.
     *
     * For `rel="preload"` and `as="image"` only, the `imagesrcset` attribute has similar syntax and semantics as the
     * `srcset` attribute that indicates to preload the appropriate resource used by an `img` element with corresponding
     * values for its `srcset` and `sizes` attributes.
     *
     * @param string|Stringable|UnitEnum|null $value Image srcset value to set for the element. Use valid srcset syntax
     * (for example, `image-400.jpg 400w, image-800.jpg 800w`). Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `imagesrcset` attribute.
     *
     * Usage example:
     * ```php
     * $element->imagesrcset('image-400.jpg 400w, image-800.jpg 800w');
     * $element->imagesrcset(null);
     * ```
     */
    public function imagesrcset(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::IMAGESRCSET, $value);
    }
}
