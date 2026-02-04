<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UnitEnum;

/**
 * Trait for managing the HTML `usemap` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `usemap` attribute on HTML elements.
 *
 * Intended for use in tag elements that require manipulation of the `usemap` attribute.
 *
 * Key features.
 * - Designed for use in tag elements (`<img>`).
 * - Handles the HTML `usemap` attribute.
 * - Immutable method for setting or overriding the `usemap` attribute.
 * - Supports `string`, `Stringable`, `UnitEnum`, and `null` for flexible image map reference assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#usemap
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasUsemap
{
    /**
     * Sets the HTML `usemap` attribute for the element.
     *
     * Creates a new instance with the specified image map reference value, supporting explicit assignment according to
     * the HTML specification for client-side image maps.
     *
     * The `usemap` attribute associates the image with a `<map>` element, creating a client-side image map. The value
     * must be a valid hash-name reference to a `<map>` element in the same document (for example, "#mapname").
     *
     * @param string|Stringable|UnitEnum|null $value Image map reference to set for the element. Use a hash-name
     * reference (for example, "#mapname") that matches the `name` attribute of a `<map>` element. Can be `null` to
     * unset the attribute.
     *
     * @return static New instance with the updated `usemap` attribute.
     *
     * Usage example:
     * ```php
     * $element->usemap('#imagemap');
     * $element->usemap(null);
     * ```
     */
    public function usemap(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(ElementAttribute::USEMAP, $value);
    }
}
