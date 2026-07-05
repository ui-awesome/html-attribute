<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Charset, ElementAttribute};
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `charset` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta#charset
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
