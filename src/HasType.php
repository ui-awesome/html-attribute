<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Attribute, Type};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `type` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/type
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasType
{
    /**
     * Sets the `type` attribute.
     *
     * Defines the element type or resource MIME type.
     *
     * @param string|Stringable|UnitEnum|null $value Type token or MIME type, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `type` attribute.
     *
     * {@see Type} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->type('text/css');
     * $element->type('module');
     * $element->type(null);
     * ```
     */
    public function type(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Type::cases(), Attribute::TYPE);

        return $this->addAttribute(Attribute::TYPE, $value);
    }
}
