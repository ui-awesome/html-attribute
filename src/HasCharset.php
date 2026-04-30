<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Charset, ElementAttribute};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `charset` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta#charset
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasCharset
{
    /**
     * Sets the `charset` attribute.
     *
     * Declares the document character encoding.
     *
     * Usage example:
     * ```php
     * $element->charset('utf-8');
     * $element->charset(Charset::UTF_8);
     * $element->charset(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Character encoding token, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `charset` attribute.
     *
     * {@see Charset} for predefined enum values.
     */
    public function charset(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Charset::cases(), ElementAttribute::CHARSET);

        return $this->addAttribute(ElementAttribute::CHARSET, $value);
    }
}
