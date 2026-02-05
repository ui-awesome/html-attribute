<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the `alt` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * @param string|Stringable|UnitEnum|null $value Alternative text for the element, or `null` to remove the
     * attribute.
     *
     * @return static New instance with the updated `alt` attribute.
     *
     * Usage example:
     * ```php
     * $element->alt('A penguin on a beach.');
     * $element->alt('');
     * $element->alt(null);
     * ```
     */
    public function alt(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(ElementAttribute::ALT, $value);
    }
}
