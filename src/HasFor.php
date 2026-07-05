<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `for` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/for
 */
trait HasFor
{
    /**
     * Sets the `for` attribute.
     *
     * Usage example:
     * ```php
     * $element->for('username email');
     * $element->for($forValue);
     * $element->for(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Space-separated list of related IDs, or `null` to remove the
     * attribute.
     *
     * @return static New instance with the updated `for` attribute.
     */
    public function for(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::FOR, $value);
    }
}
