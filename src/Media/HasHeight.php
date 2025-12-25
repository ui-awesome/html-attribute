<?php

declare(strict_types=1);

namespace UIAwesome\Html\Media\Attribute;

/**
 * Trait for managing the HTML `height` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `height` attribute on HTML elements, following the HTML
 * and CSS specification for element sizing.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the `height` attribute,
 * ensuring correct attribute handling and flexible sizing control.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Enforces standards-compliant handling of the HTML `height` attribute.
 * - Immutable method for setting or overriding the `height` attribute.
 * - Supports int, string, and `null` for flexible height assignment.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/Properties/height
 * @property array $attributes HTML attributes array used by the implementing class.
 * @phpstan-property mixed[] $attributes
 * {@see \UIAwesome\Html\Core\Mixin\HasAttributes} for managing the underlying attributes array.
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
     * @param int|string|null $value Height value to set for the element. Use an integer for pixel values or a string
     * for CSS units (for example, `100%`, `auto`, `10em`). Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `height` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/Properties/height
     *
     * Usage example:
     * ```php
     * // sets the `height` attribute to 200 pixels
     * $element->height(200);
     *
     * // sets the `height` attribute to 50 percent
     * $element->height('50%');
     *
     * // sets the `height` attribute to auto
     * $element->height('auto');
     * ```
     */
    public function height(int|string|null $value): static
    {
        $new = clone $this;

        if ($value === null) {
            unset($new->attributes['height']);
        } else {
            $new->attributes['height'] = $value;
        }

        return $new;
    }
}
