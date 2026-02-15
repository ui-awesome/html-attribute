<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `step` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/step
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStep
{
    /**
     * Sets the `step` attribute.
     *
     * @param float|int|string|Stringable|UnitEnum|null $value Step value. Use `any` for no stepping restriction, or
     * `null` to remove the attribute.
     *
     * @return static New instance with the updated `step` attribute.
     *
     * Usage example:
     * ```php
     * $element->step(1);
     * $element->step(0.5);
     * $element->step('any');
     * $element->step(null);
     * ```
     */
    public function step(float|int|string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(Attribute::STEP, $value);
    }
}
