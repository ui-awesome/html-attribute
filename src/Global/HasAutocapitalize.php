<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\Autocapitalize;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the HTML `autocapitalize` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/autocapitalize
 */
trait HasAutocapitalize
{
    /**
     * Sets the `autocapitalize` attribute.
     *
     * Usage example:
     * ```php
     * $element->autocapitalize('sentences')->render();
     * $element->autocapitalize(\UIAwesome\Html\Attribute\Values\Autocapitalize::SENTENCES)->render();
     * ```
     *
     * @param string|UnitEnum|null $value Capitalization behavior ('none', 'off', 'sentences', 'on', 'words',
     * 'characters'), or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `autocapitalize` attribute.
     *
     * {@see Autocapitalize} for predefined enum values.
     */
    public function autocapitalize(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Autocapitalize::cases(), 'autocapitalize');

        return $this->addAttribute('autocapitalize', $value);
    }
}
