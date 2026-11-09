<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `style` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/style
 */
trait HasStyle
{
    /**
     * Sets the `style` attribute.
     *
     * @param mixed[]|string|Stringable|UnitEnum|null $value Style value as a CSS string, an associative array of CSS
     * property-value pairs, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `style` attribute.
     */
    public function style(array|string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::STYLE, $value);
    }
}
