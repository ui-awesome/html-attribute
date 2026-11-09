<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\CSSClass;
use UnitEnum;

/**
 * Provides an immutable API for the `class` attribute.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/class
 */
trait HasClass
{
    /**
     * Sets the `class` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value CSS class value, or `null` to remove the attribute.
     * @param bool $override Whether to override existing classes (`true`) or merge (`false`).
     *
     * @return static New instance with the updated `class` attribute.
     */
    public function class(string|Stringable|UnitEnum|null $value, bool $override = false): static
    {
        $new = clone $this;

        if ($value === null) {
            unset($new->attributes[GlobalAttribute::CLASS_CSS->value]);
        } else {
            CSSClass::add($new->attributes, $value, $override);
        }

        return $new;
    }
}
