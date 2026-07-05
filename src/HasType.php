<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{Attribute, Type};
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `type` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/type
 */
trait HasType
{
    /**
     * Sets the `type` attribute.
     *
     * Defines the element type or resource MIME type.
     *
     * Usage example:
     * ```php
     * $element->type('text/css');
     * $element->type('module');
     * $element->type(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Type token or MIME type, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `type` attribute.
     *
     * {@see Type} for predefined enum values.
     */
    public function type(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Type::cases(), Attribute::TYPE);

        return $this->addAttribute(Attribute::TYPE, $value);
    }
}
