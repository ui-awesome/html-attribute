<?php

declare(strict_types=1);

namespace UIAwesome\Html\Media\Attribute;

/**
 * Trait for managing the HTML `alt` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `alt` attribute on HTML elements, following the HTML
 * specification for alternative text for images.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the `alt` attribute,
 * ensuring correct attribute handling and accessibility compliance.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Enforces standards-compliant handling of the HTML `alt` attribute.
 * - Immutable method for setting or overriding the `alt` attribute.
 * - Supports string and `null` for flexible alternative text assignment.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#alt
 * @property array $attributes HTML attributes array used by the implementing class.
 * @phpstan-property mixed[] $attributes
 * {@see \UIAwesome\Html\Core\Mixin\HasAttributes} for managing the underlying attributes array.
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
     * // sets the `alt` attribute to a descriptive text
     * $element->alt('A penguin on a beach.');
     *
     * // sets the `alt` attribute to an empty string for decorative images
     * $element->alt('');
     *
     * // unsets the `alt` attribute
     * $element->alt(null);
     * ```
     */
    public function alt(string|null $value): static
    {
        $new = clone $this;

        if ($value === null) {
            unset($new->attributes['alt']);
        } else {
            $new->attributes['alt'] = $value;
        }

        return $new;
    }
}
