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
     * Usage example:
     * ```php
     * $element = $element->itemId('http://example.com/item');
     * $element = $element->itemId(null);
     * ```
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
     * Usage example:
     * ```php
     * $element = $element->itemProp('name');
     * $element = $element->itemProp(null);
     * ```
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
     * Usage example:
     * ```php
     * $element = $element->itemRef('additional-info');
     * $element = $element->itemRef(null);
     * ```
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
     * Usage example:
     * ```php
     * $element = $element->itemScope(true);
     * $element = $element->itemScope(null);
     * ```
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
     * Usage example:
     * ```php
     * $element = $element->itemType('http://schema.org/Person');
     * $element = $element->itemType(null);
     * ```
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
