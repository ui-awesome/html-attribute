<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `max` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `max` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `max` attribute.
 *
 * Key features.
 * - Designed for use in form control elements (`<input type="date">`, `<input type="datetime-local">`,
 *   `<input type="month">`, `<input type="number">`, `<input type="range">`, `<input type="time">`,
 *   `<input type="week">`, `<meter>`, and `<progress>`).
 * - Handles the HTML `max` attribute for defining maximum values.
 * - Immutable method for setting or overriding the `max` attribute.
 * - Supports `float`, `int`, `string`, `Stringable`, `UnitEnum`, and `null` for flexible max assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/max
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMax
{
    /**
     * Sets the HTML `max` attribute for the element.
     *
     * Creates a new instance with the specified max value.
     *
     * The `max` attribute defines the greatest value in the range of permitted values.
     * - If the `value` entered exceeds this, the element fails constraint validation.
     * - For date and time inputs, the value must be a valid date/time string. For numeric inputs, the value must be a
     *   number. If the value is not a valid number, the element has no maximum value.
     * - There is a special case: if the data type is periodic (such as for dates or times), the value of `max` may be
     *   lower than the value of `min`, which indicates that the range may wrap around; for example, this allows you to
     *   specify a time range from 10 PM to 4 AM.
     *
     * @param float|int|string|Stringable|UnitEnum|null $value Maximum value to set for the element. Can be `null` to
     * unset the attribute.
     *
     * @return static New instance with the updated `max` attribute.
     *
     * Usage example:
     * ```php
     * $element->max(100);
     * $element->max('2024-12-31');
     * $element->max('23:59');
     * $element->max(null);
     * ```
     */
    public function max(float|int|string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::MAX, $value);
    }
}
