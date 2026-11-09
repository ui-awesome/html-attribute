<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `imagesrcset` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#imagesrcset
 */
trait HasImageSrcSet
{
    /**
     * Sets the `imagesrcset` attribute.
     *
     * Defines the image srcset descriptor list for preload links.
     *
     * @param string|Stringable|UnitEnum|null $value Image srcset descriptor list, or `null` to remove the
     * attribute.
     *
     * @return static New instance with the updated `imagesrcset` attribute.
     */
    public function imagesrcset(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(ElementAttribute::IMAGESRCSET, $value);
    }
}
