<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `imagesizes` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#imagesizes
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasImagesizes
{
    /**
     * Sets the `imagesizes` attribute.
     *
     * Defines the image sizes descriptor list for preload links.
     *
     * @param string|Stringable|UnitEnum|null $value Image sizes descriptor list, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `imagesizes` attribute.
     *
     * Usage example:
     * ```php
     * $element->imagesizes('100vw');
     * $element->imagesizes('(max-width: 600px) 100vw, 50vw');
     * $element->imagesizes(null);
     * ```
     */
    public function imagesizes(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(Attribute::IMAGESIZES, $value);
    }
}
