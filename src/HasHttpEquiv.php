<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Attribute, HttpEquiv};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `http-equiv` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/http-equiv
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasHttpEquiv
{
    /**
     * Sets the `http-equiv` attribute.
     *
     * Declares the pragma directive for the metadata entry.
     *
     * @param string|Stringable|UnitEnum|null $value Pragma directive token, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `http-equiv` attribute.
     *
     * {@see HttpEquiv} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->httpEquiv('refresh');
     * $element->httpEquiv(HttpEquiv::REFRESH);
     * $element->httpEquiv(null);
     * ```
     */
    public function httpEquiv(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, HttpEquiv::cases(), Attribute::HTTP_EQUIV);

        return $this->addAttribute(Attribute::HTTP_EQUIV, $value);
    }
}
