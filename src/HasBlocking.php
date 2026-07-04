<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Blocking, ElementAttribute};
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `blocking` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/style#blocking
 */
trait HasBlocking
{
    /**
     * Sets the `blocking` attribute.
     *
     * Controls whether rendering waits for the external resource.
     *
     * Usage example:
     * ```php
     * $element->blocking('render');
     * $element->blocking(Blocking::RENDER);
     * $element->blocking(null);
     * ```
     *
     * @param string|UnitEnum|null $value Blocking token, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `blocking` attribute.
     *
     * {@see Blocking} for predefined enum values.
     */
    public function blocking(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Blocking::cases(), ElementAttribute::BLOCKING);

        return $this->addAttribute(ElementAttribute::BLOCKING, $value);
    }
}
