<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Decoding, ElementAttribute};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML/SVG `decoding` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `decoding` attribute on HTML and SVG image elements.
 *
 * Intended for use in tags elements that require manipulation of the `decoding` attribute.
 *
 * Key features.
 * - Designed for use in tags elements (`<img>` and `<svg>`).
 * - Handles the HTML/SVG `decoding` attribute.
 * - Immutable method for setting or overriding the `decoding` attribute.
 * - Supports `string`, `Stringable`, `UnitEnum`, and `null` for flexible decoding hint assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Creates a new instance with the specified decoding hint value.
     *
     * Provides a hint to the browser on how to decode the image data.
     * - Use `async` to decode the image asynchronously, reducing delay in presenting other content but potentially
     *   causing the image to be rendered later.
     * - Use `sync` to decode the image synchronously before presenting other content, ensuring the image is ready but
     *   potentially causing a delay.
     * - Use `auto` to let the browser decide the best decoding strategy based on its own heuristics.
     *
     * @param string|Stringable|UnitEnum|null $value Decoding hint value to set for the element. Use `async` for
     * asynchronous decoding, `sync` for synchronous decoding, or `auto` for browser-determined strategy.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `decoding` attribute.
     *
     * {@see Decoding} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->decoding('async');
     * $element->decoding(Decoding::ASYNC);
     * $element->decoding(null);
     * ```
     */
    public function decoding(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Decoding::cases(), ElementAttribute::DECODING);

        return $this->addAttribute(ElementAttribute::DECODING, $value);
    }
}
