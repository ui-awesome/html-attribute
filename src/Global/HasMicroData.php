<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UnitEnum;

/**
 * Provides an immutable API for microdata attributes.
 *
 * @method static setAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
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
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemid
     *
     * Usage example:
     * ```php
     * $element = $element->itemId('http://example.com/item');
     * $element = $element->itemId(null);
     * ```
     */
    public function itemId(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(GlobalAttribute::ITEMID, $value);
    }

    /**
     * Sets the `itemprop` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Microdata item property, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `itemprop` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemprop
     *
     * Usage example:
     * ```php
     * $element = $element->itemProp('name');
     * $element = $element->itemProp(null);
     * ```
     */
    public function itemProp(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(GlobalAttribute::ITEMPROP, $value);
    }

    /**
     * Sets the `itemref` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Microdata item reference, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `itemref` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemref
     *
     * Usage example:
     * ```php
     * $element = $element->itemRef('additional-info');
     * $element = $element->itemRef(null);
     * ```
     */
    public function itemRef(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(GlobalAttribute::ITEMREF, $value);
    }

    /**
     * Sets the `itemscope` attribute.
     *
     * @param bool|null $value Whether to enable itemscope, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `itemscope` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemscope
     *
     * Usage example:
     * ```php
     * $element = $element->itemScope(true);
     * $element = $element->itemScope(null);
     * ```
     */
    public function itemScope(bool|null $value): static
    {
        return $this->setAttribute(GlobalAttribute::ITEMSCOPE, $value);
    }

    /**
     * Sets the `itemtype` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Microdata item type, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `itemtype` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemtype
     *
     * Usage example:
     * ```php
     * $element = $element->itemType('http://schema.org/Person');
     * $element = $element->itemType(null);
     * ```
     */
    public function itemType(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(GlobalAttribute::ITEMTYPE, $value);
    }
}
