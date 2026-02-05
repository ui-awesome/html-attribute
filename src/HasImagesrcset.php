<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `imagesrcset` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#imagesrcset
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasImagesrcset
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
     *
     * Usage example:
     * ```php
     * $element->imagesrcset('image-400.jpg 400w, image-800.jpg 800w');
     * $element->imagesrcset(null);
     * ```
     */
    public function imagesrcset(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::IMAGESRCSET, $value);
    }
}
