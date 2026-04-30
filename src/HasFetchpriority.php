<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, Fetchpriority};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `fetchpriority` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/fetchpriority
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFetchpriority
{
    /**
     * Sets the `fetchpriority` attribute.
     *
     * Hints the browser about the fetch priority for the resource.
     *
     * Usage example:
     * ```php
     * $element->fetchpriority('high');
     * $element->fetchpriority(Fetchpriority::HIGH);
     * $element->fetchpriority(null);
     * ```
     *
     * @param string|UnitEnum|null $value Fetch priority token, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `fetchpriority` attribute.
     *
     * {@see Fetchpriority} for predefined enum values.
     */
    public function fetchpriority(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Fetchpriority::cases(), Attribute::FETCHPRIORITY);

        return $this->addAttribute(Attribute::FETCHPRIORITY, $value);
    }
}
