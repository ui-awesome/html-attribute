<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use UIAwesome\Html\Attribute\Values\GlobalAttribute;

/**
 * Trait for managing the global HTML microdata attributes in tag rendering.
 *
 * Provides an immutable API for setting microdata attributes (`itemid`, `itemprop`, `itemref`, `itemscope`, `itemtype`)
 * on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of microdata.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML microdata global attributes.
 * - Immutable methods for setting or overriding microdata attributes.
 * - Supports bool, string and `null` for flexible microdata assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemid
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemprop
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemref
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemscope
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemtype
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMicroData
{
    /**
     * Sets the HTML `itemid` attribute for the element.
     *
     * Creates a new instance with the specified microdata item ID, supporting explicit and nullable assignment
     * according to the HTML specification for global attributes.
     *
     * @param string|null $value Microdata item ID to set for the element. Can be `null` to unset the attribute.
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
    public function itemId(string|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ITEMID, $value);
    }

    /**
     * Sets the HTML `itemprop` attribute for the element.
     *
     * Creates a new instance with the specified microdata item property, supporting explicit and nullable assignment
     * according to the HTML specification for global attributes.
     *
     * @param string|null $value Microdata item property to set for the element. Can be `null` to unset the attribute.
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
    public function itemProp(string|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ITEMPROP, $value);
    }

    /**
     * Sets the HTML `itemref` attribute for the element.
     *
     * Creates a new instance with the specified microdata item reference, supporting explicit and nullable
     * assignment according to the HTML specification for global attributes.
     *
     * @param string|null $value Microdata item reference to set for the element. Can be `null` to unset the attribute.
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
    public function itemRef(string|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ITEMREF, $value);
    }

    /**
     * Sets the HTML `itemscope` attribute for the element.
     *
     * Creates a new instance with the specified microdata item scope, supporting explicit assignment according to the
     * HTML specification for global attributes.
     *
     * @param bool|null $value Microdata item scope to set for the element. Can be `null` to unset the attribute.
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
        return $this->addAttribute(GlobalAttribute::ITEMSCOPE, $value);
    }

    /**
     * Sets the HTML `itemtype` attribute for the element.
     *
     * Creates a new instance with the specified microdata item type, supporting explicit and nullable assignment
     * according to the HTML specification for global attributes.
     *
     * @param string|null $value Microdata item type to set for the element. Can be `null` to unset the attribute.
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
    public function itemType(string|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ITEMTYPE, $value);
    }
}
