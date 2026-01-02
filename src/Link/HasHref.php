<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Link;

/**
 * Trait for managing the HTML and SVG `href` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `href` attribute on HTML and SVG elements, following
 * the HTML and SVG specifications for hyperlink and resource reference assignment.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the `href` attribute,
 * ensuring correct attribute handling and flexible link or resource control.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Enforces standards-compliant handling of the HTML and SVG `href` attribute.
 * - Immutable method for setting or overriding the `href` attribute.
 * - Supports string and `null` for flexible URL assignment.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#href
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/href
 * @property array $attributes HTML attributes array used by the implementing class.
 * @phpstan-property mixed[] $attributes
 * {@see \UIAwesome\Html\Core\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasHref
{
    /**
     * Sets the HTML or SVG `href` attribute for the element.
     *
     * Creates a new instance with the specified URL or resource reference, supporting explicit assignment according to
     * the HTML and SVG specifications for hyperlink and resource attributes.
     *
     * The `href` attribute defines the target URL or resource reference for the element. Accepts a string representing
     * a valid URL, path, or fragment. Setting `href` to `null` unsets the attribute.
     *
     * @param string|null $value URL or resource reference to set for the element. Use a valid URL, path, or fragment as
     * a string. Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `href` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#href
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/href
     *
     * Usage example:
     * ```php
     * // sets the `href` attribute to an absolute URL
     * $element->href('https://example.com/page');
     *
     * // sets the `href` attribute to a relative path
     * $element->href('/about');
     *
     * // sets the `href` attribute to a fragment identifier
     * $element->href('#section');
     *
     * // unsets the `href` attribute
     * $element->href(null);
     * ```
     */
    public function href(string|null $value): static
    {
        $new = clone $this;

        if ($value === null) {
            unset($new->attributes['href']);
        } else {
            $new->attributes['href'] = $value;
        }

        return $new;
    }
}
