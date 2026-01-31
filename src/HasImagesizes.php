<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `imagesizes` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `imagesizes` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `imagesizes` attribute.
 *
 * Key features.
 * - Designed for use in link elements with `rel="preload"` and `as="image"`.
 * - Handles the HTML `imagesizes` attribute.
 * - Immutable method for setting or overriding the `imagesizes` attribute.
 * - Supports string, Stringable, UnitEnum, and `null` for flexible assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#imagesizes
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasImagesizes
{
    /**
     * Sets the HTML `imagesizes` attribute for the element.
     *
     * Creates a new instance with the specified image sizes value.
     *
     * For `rel="preload"` and `as="image"` only, the `imagesizes` attribute has similar syntax and semantics as the
     * `sizes` attribute that indicates to preload the appropriate resource used by an `img` element with corresponding
     * values for its `srcset` and `sizes` attributes.
     *
     * @param string|Stringable|UnitEnum|null $value Image sizes value to set for the element. Use valid sizes syntax
     * (for example, `100vw`, `(max-width: 600px) 100vw, 50vw`). Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `imagesizes` attribute.
     *
     * Usage example:
     * ```php
     * $element->imagesizes('100vw');
     * $element->imagesizes('(max-width: 600px) 100vw, 50vw');
     * $element->imagesizes(null);
     * ```
     */
    public function imagesizes(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::IMAGESIZES, $value);
    }
}
