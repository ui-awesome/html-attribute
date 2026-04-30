<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the `sizes` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#sizes
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSizes
{
    /**
     * Sets the `sizes` attribute.
     *
     * Defines the icon size descriptors for the linked resource.
     *
     * Usage example:
     * ```php
     * $element->sizes('any');
     * $element->sizes('16x16 32x32');
     * $element->sizes(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Icon size list or 'any' token, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `sizes` attribute.
     */
    public function sizes(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(ElementAttribute::SIZES, $value);
    }
}
