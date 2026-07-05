<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, HttpEquiv};
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `http-equiv` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/http-equiv
 */
trait HasHttpEquiv
{
    /**
     * Sets the `http-equiv` attribute.
     *
     * Declares the pragma directive for the metadata entry.
     *
     * Usage example:
     * ```php
     * $element->httpEquiv('refresh');
     * $element->httpEquiv(HttpEquiv::REFRESH);
     * $element->httpEquiv(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Pragma directive token, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `http-equiv` attribute.
     *
     * {@see HttpEquiv} for predefined enum values.
     */
    public function httpEquiv(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, HttpEquiv::cases(), ElementAttribute::HTTP_EQUIV);

        return $this->addAttribute(ElementAttribute::HTTP_EQUIV, $value);
    }
}
