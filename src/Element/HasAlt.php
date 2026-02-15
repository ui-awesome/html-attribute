<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the `alt` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#alt
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasAlt
{
    /**
     * Sets the `alt` attribute.
     *
     * Usage example:
     * ```php
     * $element->alt('A penguin on a beach.');
     * $element->alt('');
     * $element->alt(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Alternative text for the element, or `null` to remove the
     * attribute.
     *
     * @return static New instance with the updated `alt` attribute.
     */
    public function alt(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(ElementAttribute::ALT, $value);
    }
}
