<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `content` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/content
 */
trait HasContent
{
    /**
     * Sets the `content` attribute.
     *
     * Defines the metadata value for the current `name` or `http-equiv` entry.
     *
     * Usage example:
     * ```php
     * $element->content('width=device-width, initial-scale=1');
     * $element->content('The HTML reference describes all elements...');
     * $element->content(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Metadata content value, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `content` attribute.
     */
    public function content(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::CONTENT, $value);
    }
}
