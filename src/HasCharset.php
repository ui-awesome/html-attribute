<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, Charset};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `charset` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `charset` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `charset` attribute and value validation.
 *
 * Key features.
 * - Designed for use in meta elements.
 * - Handles the HTML `charset` attribute.
 * - Immutable method for setting or overriding the `charset` attribute.
 * - Supports string, UnitEnum, and `null` for flexible charset assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta#charset
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasCharset
{
    /**
     * Sets the HTML `charset` attribute for the element.
     *
     * Creates a new instance with the specified character encoding value.
     *
     * Declares the document's character encoding. If the attribute is present, its value must be an ASCII
     * case-insensitive match for the string `"utf-8"`, because UTF-8 is the only valid encoding for HTML5 documents.
     *
     * `<meta>` elements which declare a character encoding must be located entirely within the first 1024 bytes of
     * the document.
     *
     * @param string|UnitEnum|null $value Character encoding value to set for the element. Use `utf-8` (the only
     * valid encoding for HTML5). Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `charset` attribute.
     *
     * Usage example:
     * ```php
     * $element->charset('utf-8');
     * $element->charset(Charset::UTF_8);
     * $element->charset(null);
     * ```
     */
    public function charset(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Charset::cases(), Attribute::CHARSET);

        return $this->addAttribute(Attribute::CHARSET, $value);
    }
}
