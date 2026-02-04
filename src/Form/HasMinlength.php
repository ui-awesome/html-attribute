<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Exception\Message;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\{Enum, Validator};
use UnitEnum;

/**
 * Trait for managing the HTML `minlength` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `minlength` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `minlength` attribute.
 *
 * Key features.
 * - Designed for use in form control elements (`<input>` and `<textarea>`).
 * - Handles the HTML `minlength` attribute for minimum character requirements.
 * - Immutable method for setting or overriding the `minlength` attribute.
 * - Supports int and `null` for flexible minlength assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/minlength
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMinlength
{
    /**
     * Sets the HTML `minlength` attribute for the element.
     *
     * Creates a new instance with the specified minlength value.
     *
     * The `minlength` attribute defines the minimum string length (measured in UTF-16 code units) that the user can
     * enter into the entry field.
     * - This must be a non-negative integer value smaller than or equal to the value specified by `maxlength`.
     * - If no `minlength` is specified, or an invalid value is specified, the input has no minimum length.
     * - The input will fail constraint validation if the length of the text entered is fewer than `minlength` UTF-16
     *   code units, preventing form submission.
     * - Constraint validation is only applied when the value is changed by the user.
     *
     * @param int|string|Stringable|UnitEnum|null $value Minimum length (number of characters) to set for the element.
     * Must be 0 or higher. Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the value is not a valid integer or string representation of an `value >= 0`.
     *
     * @return static New instance with the updated `minlength` attribute.
     *
     * Usage example:
     * ```php
     * $element->minlength(3);
     * $element->minlength(8);
     * $element->minlength(null);
     * ```
     */
    public function minlength(int|string|Stringable|UnitEnum|null $value): static
    {
        if ($value instanceof UnitEnum) {
            $value = Enum::normalizeValue($value);
        }

        if ($value !== null && Validator::intLike($value) === false) {
            throw new InvalidArgumentException(
                Message::ATTRIBUTE_INVALID_VALUE->getMessage(
                    (string) $value,
                    Attribute::MINLENGTH->value,
                    'value >= 0',
                ),
            );
        }

        return $this->addAttribute(Attribute::MINLENGTH, $value);
    }
}
