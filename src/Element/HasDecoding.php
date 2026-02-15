<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Decoding, ElementAttribute};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the HTML and SVG `decoding` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#decoding
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/decoding
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDecoding
{
    /**
     * Sets the `decoding` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Decoding hint value. Use `async`, `sync`, or `auto`, or `null` to
     * remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
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

        return $this->setAttribute(ElementAttribute::DECODING, $value);
    }
}
