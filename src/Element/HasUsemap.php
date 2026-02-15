<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the `usemap` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#usemap
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasUsemap
{
    /**
     * Sets the `usemap` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Hash-name reference to a `map` element, or `null` to remove the
     * attribute.
     *
     * @return static New instance with the updated `usemap` attribute.
     *
     * Usage example:
     * ```php
     * $element->usemap('#imagemap');
     * $element->usemap(null);
     * ```
     */
    public function usemap(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(ElementAttribute::USEMAP, $value);
    }
}
