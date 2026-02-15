<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `max` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/max
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMax
{
    /**
     * Sets the `max` attribute.
     *
     * Usage example:
     * ```php
     * $element->max(100);
     * $element->max('2024-12-31');
     * $element->max('23:59');
     * $element->max(null);
     * ```
     *
     * @param float|int|string|Stringable|UnitEnum|null $value Maximum value, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `max` attribute.
     */
    public function max(float|int|string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(Attribute::MAX, $value);
    }
}
