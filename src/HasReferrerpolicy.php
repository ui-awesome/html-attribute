<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Attribute, Referrerpolicy};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `referrerpolicy` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/referrerpolicy
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasReferrerpolicy
{
    /**
     * Sets the `referrerpolicy` attribute.
     *
     * Controls how much referrer information is sent with requests.
     *
     * @param string|Stringable|UnitEnum|null $value Referrer policy token, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `referrerpolicy` attribute.
     *
     * {@see Referrerpolicy} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->referrerpolicy('no-referrer');
     * $element->referrerpolicy(Referrerpolicy::NO_REFERRER);
     * $element->referrerpolicy(null);
     * ```
     */
    public function referrerpolicy(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Referrerpolicy::cases(), Attribute::REFERRERPOLICY);

        return $this->setAttribute(Attribute::REFERRERPOLICY, $value);
    }
}
