<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, Blocking};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `blocking` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/style#blocking
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasBlocking
{
    /**
     * Sets the `blocking` attribute.
     *
     * Controls whether rendering waits for the external resource.
     *
     * @param string|UnitEnum|null $value Blocking token, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `blocking` attribute.
     *
     * {@see Blocking} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->blocking('render');
     * $element->blocking(Blocking::RENDER);
     * $element->blocking(null);
     * ```
     */
    public function blocking(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Blocking::cases(), Attribute::BLOCKING);

        return $this->addAttribute(Attribute::BLOCKING, $value);
    }
}
