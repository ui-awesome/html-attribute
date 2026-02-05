<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `min` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/min
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMin
{
    /**
     * Sets the `min` attribute.
     *
     * @param float|int|string|Stringable|UnitEnum|null $value Minimum value, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `min` attribute.
     *
     * Usage example:
     * ```php
     * $element->min(0);
     * $element->min('2024-01-01');
     * $element->min('08:00');
     * $element->min(null);
     * ```
     */
    public function min(float|int|string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::MIN, $value);
    }
}
