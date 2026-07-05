<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\Autocorrect;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the HTML `autocorrect` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/autocorrect
 */
trait HasAutocorrect
{
    /**
     * Sets the `autocorrect` attribute.
     *
     * Usage example:
     * ```php
     * $element->autocorrect('on')->render();
     * $element->autocorrect(\UIAwesome\Html\Attribute\Values\Autocorrect::ON)->render();
     * ```
     *
     * @param string|UnitEnum|null $value Autocorrect behavior ('on' or 'off'), or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `autocorrect` attribute.
     *
     * {@see Autocorrect} for predefined enum values.
     */
    public function autocorrect(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Autocorrect::cases(), 'autocorrect');

        return $this->addAttribute('autocorrect', $value);
    }
}
