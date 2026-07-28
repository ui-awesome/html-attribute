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
 * Provides an immutable API for the `type` attribute of form controls.
 *
 * Restricted to the `<input>` control types. Elements that read `type` as an open MIME hint declare their own setter
 * instead of using this trait.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input#input_types
 */
trait HasType
{
    /**
     * Sets the `type` attribute.
     *
     * Restricts the value to the `<input>` control types. Empty and `null` values bypass validation and produce no
     * rendered attribute.
     *
     * Usage example:
     * ```php
     * $element->type('checkbox');
     * $element->type(\UIAwesome\Html\Attribute\Values\Type::EMAIL);
     * $element->type(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Input control type, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If a non-empty value is not an `<input>` control type.
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
