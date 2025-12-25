<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Media;

/**
 * Trait for managing the HTML `src` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `src` attribute on HTML elements, following the HTML
 * specification for image source assignment.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the `src` attribute,
 * ensuring correct attribute handling and flexible image source control.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Enforces standards-compliant handling of the HTML `src` attribute.
 * - Immutable method for setting or overriding the `src` attribute.
 * - Supports string and `null` for flexible source assignment.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLImageElement/src
 * @property array $attributes HTML attributes array used by the implementing class.
 * @phpstan-property mixed[] $attributes
 * {@see \UIAwesome\Html\Core\Mixin\HasAttributes} for managing the underlying attributes array.
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
     * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLImageElement/src
     *
     * Usage example:
     * ```php
     * // sets the `src` attribute to an image URL
     * $element->src('https://example.com/image.png');
     *
     * // sets the `src` attribute to a relative path
     * $element->src('images/photo.jpg');
     *
     * // unsets the `src` attribute
     * $element->src(null);
     * ```
     */
    public function src(string|null $value): static
    {
        $new = clone $this;

        if ($value === null) {
            unset($new->attributes['src']);
        } else {
            $new->attributes['src'] = $value;
        }

        return $new;
    }
}
