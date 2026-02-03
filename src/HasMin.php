<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `min` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `min` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `min` attribute.
 *
 * Key features.
 * - Designed for use in date, time, and numeric input elements.
 * - Handles the HTML `min` attribute for defining minimum values.
 * - Immutable method for setting or overriding the `min` attribute.
 * - Supports float, int, string, Stringable, UnitEnum, and `null` for flexible min assignment.
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
     * Sets the HTML `min` attribute for the element.
     *
     * Creates a new instance with the specified min value.
     *
     * The `min` attribute defines the most negative value in the range of permitted values. If the `value` entered is
     * less than this, the element fails constraint validation. It is valid for date, month, week, time, datetime-local,
     * number, and range input types, as well as meter.
     *
     * For date and time inputs, the value must be a valid date/time string. For numeric inputs, the value must be a
     * number. This value must be less than or equal to the value of the `max` attribute.
     *
     * If the `min` attribute is present but is not specified or is invalid, no `min` value is applied. If the `min`
     * attribute is valid and a non-empty value is less than the minimum allowed, constraint validation will prevent
     * form submission.
     *
     * There is a special case: if the data type is periodic (such as for dates or times), the value of `max` may be
     * lower than the value of `min`, which indicates that the range may wrap around; for example, this allows you to
     * specify a time range from 10 PM to 4 AM.
     *
     * @param float|int|string|Stringable|UnitEnum|null $value Minimum value to set for the element. Can be `null` to
     * unset the attribute.
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
