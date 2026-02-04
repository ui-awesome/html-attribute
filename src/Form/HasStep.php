<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `step` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `step` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `step` attribute.
 *
 * Key features.
 * - Designed for use in form control elements (`<input type="date">`, `<input type="datetime-local">`,
 *   `<input type="month">`, `<input type="number">`, `<input type="range">`, `<input type="time">`, and
 *   `<input type="week">`).
 * - Handles the HTML `step` attribute for defining value granularity.
 * - Immutable method for setting or overriding the `step` attribute.
 * - Supports float, int, string, Stringable, UnitEnum, and `null` for flexible step assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Sets the HTML `step` attribute for the element.
     *
     * Creates a new instance with the specified step value.
     *
     * The `step` attribute specifies the granularity that the value must adhere to.
     * - Only values which are a whole number of steps from the step base are valid.
     * - The step base is `min` if specified, `value` otherwise, or `0` if neither is provided (except for
     *   `<input type="week">`, which has a default step base representing the start of week `1970-W01`).
     *
     * If not explicitly included.
     * - `step` defaults to `1` for `number` and `range`.
     * - Each date/time input type has a default `step` value appropriate for the type.
     * - The value must be a positive number (`integer` or `float`) or the special value `any`, which means no stepping
     *   is implied and any value is allowed (barring other constraints like `min` and `max`).
     * - When the data entered doesn't adhere to the stepping configuration, the value is considered invalid in
     *   constraint validation and will match the `:invalid` pseudoclass.
     *
     * @param float|int|string|Stringable|UnitEnum|null $value Step value to set for the element. Use `any` for no
     * stepping restriction, a positive number for specific granularity. Can be `null` to unset the attribute.
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
        return $this->addAttribute(Attribute::STEP, $value);
    }
}
