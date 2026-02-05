<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, Rel};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `rel` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRel
{
    /**
     * Sets the `rel` attribute.
     *
     * Defines the relationship between the current document and the linked resource.
     *
     * @param string|UnitEnum|null $value Link type token, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `rel` attribute.
     *
     * {@see Rel} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->rel('noopener');
     * $element->rel(Rel::NOOPENER);
     * $element->rel(null);
     * ```
     */
    public function rel(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Rel::cases(), Attribute::REL);

        return $this->addAttribute(Attribute::REL, $value);
    }
}
