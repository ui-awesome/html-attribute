<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `title` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/title
 */
trait HasTitle
{
    /**
     * Sets the `title` attribute.
     *
     * Usage example:
     * ```php
     * $element->title('Click to save changes');
     * $element->title('Enter your full name');
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Advisory title text, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `title` attribute.
     */
    public function title(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::TITLE, $value);
    }
}
