<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for microdata attributes.
 *
 * @mixin HasAttributes
 */
trait HasMicroData
{
    /**
     * Sets the `itemid` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Microdata item ID, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `itemid` attribute.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemid
     */
    public function itemId(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ITEMID, $value);
    }

    /**
     * Sets the `itemprop` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Microdata item property, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `itemprop` attribute.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemprop
     */
    public function itemProp(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ITEMPROP, $value);
    }

    /**
     * Sets the `itemref` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Microdata item reference, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `itemref` attribute.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemref
     */
    public function itemRef(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ITEMREF, $value);
    }

    /**
     * Sets the `itemscope` attribute.
     *
     * @param bool|null $value Whether to enable itemscope, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `itemscope` attribute.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemscope
     */
    public function itemScope(bool|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ITEMSCOPE, $value);
    }

    /**
     * Sets the `itemtype` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Microdata item type, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `itemtype` attribute.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemtype
     */
    public function itemType(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ITEMTYPE, $value);
    }
}
