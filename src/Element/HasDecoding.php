<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Decoding, ElementAttribute};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML/SVG `decoding` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `decoding` attribute on HTML and SVG image elements.
 *
 * Intended for use in image elements that require manipulation of the decoding behavior and value validation.
 *
 * Key features.
 * - Designed for use in image elements (img, SVG image) requiring decoding hint assignment.
 * - Handles the HTML/SVG `decoding` attribute.
 * - Immutable method for setting or overriding the `decoding` attribute.
 * - Supports string, UnitEnum, and `null` for flexible decoding hint assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#decoding
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/decoding
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDecoding
{
    /**
     * Sets the HTML/SVG `decoding` attribute for the element.
     *
     * Creates a new instance with the specified decoding hint value, supporting explicit assignment according to the
     * HTML specification for decoding attributes.
     *
     * @param string|UnitEnum|null $value Decoding hint value to set for the element. Use a valid decoding token (for
     * example, `async`, `sync`, `auto`). Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `decoding` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/embedded-content.html#dom-img-decoding
     *
     * Usage example:
     * ```php
     * $element->decoding('async');
     * $element->decoding(Decoding::ASYNC);
     * $element->decoding(null);
     * ```
     */
    public function decoding(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Decoding::cases(), ElementAttribute::DECODING);

        return $this->addAttribute(ElementAttribute::DECODING, $value);
    }
}
