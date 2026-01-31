<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `sizes` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `sizes` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `sizes` attribute.
 *
 * Key features.
 * - Designed for use in link elements with `rel="icon"` or similar icon types.
 * - Handles the HTML `sizes` attribute.
 * - Immutable method for setting or overriding the `sizes` attribute.
 * - Supports string, Stringable, UnitEnum, and `null` for flexible assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#sizes
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSizes
{
    /**
     * Sets the HTML `sizes` attribute for the element.
     *
     * Creates a new instance with the specified sizes value.
     *
     * Defines the sizes of the icons for visual media contained in the resource. It must be present only if the `rel`
     * contains a value of `icon` or a non-standard type such as Apple's `apple-touch-icon`. It may have the following
     * values: `any`, meaning that the icon can be scaled to any size as it is in a vector format, or a white-space
     * separated list of sizes, each in the format `<width>x<height>`.
     *
     * @param string|Stringable|UnitEnum|null $value Sizes value to set for the element. Use `any` for vector formats,
     * or size list like `16x16 32x32 48x48`. Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `sizes` attribute.
     *
     * Usage example:
     * ```php
     * $element->sizes('any');
     * $element->sizes('16x16 32x32');
     * $element->sizes(null);
     * ```
     */
    public function sizes(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::SIZES, $value);
    }
}
