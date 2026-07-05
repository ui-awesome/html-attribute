<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `name` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/name
 */
trait HasName
{
    /**
     * Sets the `name` attribute.
     *
     * Defines the metadata name or form control name.
     *
     * Usage example:
     * ```php
     * $element->name('viewport');
     * $element->name(MetaName::VIEWPORT);
     * $element->name(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Name value, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `name` attribute.
     *
     * {@see \UIAwesome\Html\Attribute\Values\MetaName} for predefined enum values.
     */
    public function name(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(ElementAttribute::NAME, $value);
    }
}
