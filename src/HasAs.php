<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{AsValue, ElementAttribute};
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `as` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
 */
trait HasAs
{
    /**
     * Sets the `as` attribute.
     *
     * Identifies the resource type for preload and modulepreload links.
     *
     * Usage example:
     * ```php
     * $element->as('font');
     * $element->as(AsValue::FONT);
     * $element->as(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Resource type token, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `as` attribute.
     *
     * {@see AsValue} for predefined enum values.
     */
    public function as(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, AsValue::cases(), ElementAttribute::AS);

        return $this->addAttribute(ElementAttribute::AS, $value);
    }
}
