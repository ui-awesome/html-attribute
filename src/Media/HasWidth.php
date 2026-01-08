<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Media;

/**
 * Trait for managing the HTML `width` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `width` attribute on HTML elements, following the HTML
 * specification for element sizing and layout.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the `width` attribute,
 * ensuring correct attribute handling and flexible sizing control.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Enforces standards-compliant handling of the HTML `width` attribute.
 * - Immutable method for setting or overriding the `width` attribute.
 * - Supports int, string, and `null` for flexible width assignment.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLImageElement/width
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
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
     * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLImageElement/width
     *
     * Usage example:
     * ```php
     * // sets the `width` attribute to 400 pixels
     * $element->width(400);
     *
     * // sets the `width` attribute to 50 percent
     * $element->width('50%');
     *
     * // sets the `width` attribute to auto
     * $element->width('auto');
     *
     * // unsets the `width` attribute
     * $element->width(null);
     * ```
     */
    public function width(int|string|null $value): static
    {
        return $this->addAttribute('width', $value);
    }
}
