<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{AsValue, Attribute};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `as` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasAs
{
    /**
     * Sets the `as` attribute.
     *
     * Identifies the resource type for preload and modulepreload links.
     *
     * @param string|Stringable|UnitEnum|null $value Resource type token, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `as` attribute.
     *
     * {@see AsValue} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->as('font');
     * $element->as(AsValue::FONT);
     * $element->as(null);
     * ```
     */
    public function as(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, AsValue::cases(), Attribute::AS);

        return $this->setAttribute(Attribute::AS, $value);
    }
}
