<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, Target};
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `target` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/target
 */
trait HasTarget
{
    /**
     * Sets the `target` attribute.
     *
     * Defines the browsing context that receives the link or form submission.
     *
     * Usage example:
     * ```php
     * $element->target('_blank');
     * $element->target(Target::BLANK);
     * $element->target(null);
     * ```
     *
     * @param string|UnitEnum|null $value Browsing context name, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `target` attribute.
     *
     * {@see Target} for predefined enum values.
     */
    public function target(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Target::cases(), Attribute::TARGET);

        return $this->addAttribute(Attribute::TARGET, $value);
    }
}
