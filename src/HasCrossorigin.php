<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, Crossorigin};
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `crossorigin` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/crossorigin
 */
trait HasCrossorigin
{
    /**
     * Sets the `crossorigin` attribute.
     *
     * Controls credentialed requests for cross-origin resources.
     *
     * Usage example:
     * ```php
     * $element->crossorigin('anonymous');
     * $element->crossorigin(Crossorigin::ANONYMOUS);
     * $element->crossorigin(null);
     * ```
     *
     * @param string|UnitEnum|null $value CORS mode token, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `crossorigin` attribute.
     *
     * {@see Crossorigin} for predefined enum values.
     */
    public function crossorigin(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Crossorigin::cases(), Attribute::CROSSORIGIN);

        return $this->addAttribute(Attribute::CROSSORIGIN, $value);
    }
}
