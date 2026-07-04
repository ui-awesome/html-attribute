<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `src` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/src
 */
trait HasSrc
{
    /**
     * Sets the `src` attribute.
     *
     * Specifies the resource URL.
     *
     * Usage example:
     * ```php
     * $element->src('https://example.com/script.js');
     * $element->src('./local/file.css');
     * $element->src(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Resource URL, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `src` attribute.
     */
    public function src(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::SRC, $value);
    }
}
