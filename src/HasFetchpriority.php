<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, Fetchpriority};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `fetchpriority` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `fetchpriority` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the fetch priority attribute and value
 * validation.
 *
 * Key features.
 * - Designed for use in img, link, svg, and script elements.
 * - Handles the HTML `fetchpriority` attribute.
 * - Immutable method for setting or overriding the `fetchpriority` attribute.
 * - Supports string, UnitEnum, and `null` for flexible priority assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/fetchpriority
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFetchpriority
{
    /**
     * Sets the HTML `fetchpriority` attribute for the element.
     *
     * Creates a new instance with the specified fetch priority value, supporting explicit assignment according to the
     * HTML specification for fetchpriority attributes.
     *
     * @param string|UnitEnum|null $value Fetch priority value to set for the element. Use a valid priority hint (for
     * example, `high`, `low`, `auto`). Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `fetchpriority` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/urls-and-fetching.html#fetch-priority-attributes
     *
     * Usage example:
     * ```php
     * $element->fetchpriority('high');
     * $element->fetchpriority(Fetchpriority::HIGH);
     * $element->fetchpriority(null);
     * ```
     */
    public function fetchpriority(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Fetchpriority::cases(), Attribute::FETCHPRIORITY);

        return $this->addAttribute(Attribute::FETCHPRIORITY, $value);
    }
}
