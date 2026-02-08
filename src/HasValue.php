<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `value` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/value
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasValue
{
    /**
     * Sets the `value` attribute.
     *
     * Defines the current value for the element.
     *
     * @param bool|float|int|string|Stringable|UnitEnum|null $value Element value as `bool`, `int`, `float`, `string`,
     * or `null` to remove the attribute.
     *
     * @return static New instance with the updated `value` attribute.
     *
     * Usage example:
     * ```php
     * $element->value(3);
     * $element->value(3.14);
     * $element->value('text');
     * $element->value(SomeEnum::VALUE);
     * $element->value(true);
     * $element->value(null);
     * ```
     */
    public function value(bool|float|int|string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::VALUE, $value);
    }
}
