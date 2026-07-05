<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `imagesizes` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#imagesizes
 */
trait HasImageSizes
{
    /**
     * Sets the `imagesizes` attribute.
     *
     * Defines the image sizes descriptor list for preload links.
     *
     * Usage example:
     * ```php
     * $element->imagesizes('100vw');
     * $element->imagesizes('(max-width: 600px) 100vw, 50vw');
     * $element->imagesizes(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Image sizes descriptor list, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `imagesizes` attribute.
     */
    public function imagesizes(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(ElementAttribute::IMAGESIZES, $value);
    }
}
