<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Exception\Message;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\{Enum, Validator};
use UnitEnum;

/**
 * Trait for managing the HTML `size` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `size` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `size` attribute.
 *
 * Key features.
 * - Designed for use in input and select elements.
 * - Handles the HTML `size` attribute for defining visible size.
 * - Immutable method for setting or overriding the `size` attribute.
 * - Supports `int`, `string`, `Stringable`, `UnitEnum`, and `null` for flexible size assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/size
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSize
{
    /**
     * Sets the HTML `size` attribute for the element.
     *
     * Creates a new instance with the specified size value.
     *
     * The `size` attribute defines the width of the control in characters or pixels depending on the element type.
     * - It is valid for `<input type="email">`, `<input type="password">`, `<input type="tel">`, `<input type="url">`,
     *   and `<input type="text">` input types, as well as `<select>`.
     * - For `<input type="password">` and `<input type="text">` inputs, the value represents the approximate number of
     *   characters (in `em` units) with a default value of `20`. For other input types and select, the value represents
     *   pixels (in `px` units).
     *
     * Note: CSS `width` takes precedence over the `size` attribute. The `size` attribute creates a similar result to
     * setting CSS `width` but with a few specialties.
     *
     * For `<select>` elements with `multiple` attribute, the `size` attribute determines the number of visible rows
     * in the list.
     *
     * @param int|string|Stringable|UnitEnum|null $value Size to set for the element. Must be 0 or higher. Can be `null`
     * to unset the attribute.
     *
     * @throws InvalidArgumentException if the value is not a valid integer or string representation of an `value >= 0`.
     *
     * @return static New instance with the updated `size` attribute.
     *
     * Usage example:
     * ```php
     * $element->size(10);
     * $element->size(50);
     * $element->size(null);
     * ```
     */
    public function size(int|string|Stringable|UnitEnum|null $value): static
    {
        if ($value instanceof UnitEnum) {
            $value = Enum::normalizeValue($value);
        }

        if ($value !== null && Validator::intLike($value) === false) {
            throw new InvalidArgumentException(
                Message::ATTRIBUTE_INVALID_VALUE->getMessage(
                    (string) $value,
                    Attribute::SIZE->value,
                    'value >= 0',
                ),
            );
        }

        return $this->addAttribute(Attribute::SIZE, $value);
    }
}
