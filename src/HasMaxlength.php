<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Exception\Message;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Helper\Validator;

/**
 * Trait for managing the HTML `maxlength` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `maxlength` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `maxlength` attribute.
 *
 * Key features.
 * - Designed for use in text input and textarea elements.
 * - Handles the HTML `maxlength` attribute for limiting character input.
 * - Immutable method for setting or overriding the `maxlength` attribute.
 * - Supports int and `null` for flexible maxlength assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/maxlength
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMaxlength
{
    /**
     * Sets the HTML `maxlength` attribute for the element.
     *
     * Creates a new instance with the specified maxlength value.
     *
     * The `maxlength` attribute defines the maximum string length (measured in UTF-16 code units) that the user can
     * enter into the field. This must be an integer value of 0 or higher. If no `maxlength` is specified, or an invalid
     * value is specified, the field has no maximum length.
     *
     * It is valid for text, search, url, tel, email, and password input types, as well as textarea. The input will fail
     * constraint validation if the length of the text entered exceeds `maxlength` UTF-16 code units.
     *
     * By default, browsers prevent users from entering more characters than allowed by the `maxlength` attribute.
     *
     * This value must be greater than or equal to the value of `minlength`.
     *
     * @param int|string|Stringable|null $value Maximum length (number of characters) to set for the element. Must be 0
     * or higher. Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the value is not a valid integer or string representation of an `value >= 0`.
     *
     * @return static New instance with the updated `maxlength` attribute.
     *
     * Usage example:
     * ```php
     * $element->maxlength(50);
     * $element->maxlength(255);
     * $element->maxlength(null);
     * ```
     */
    public function maxlength(int|string|Stringable|null $value): static
    {
        if ($value !== null && Validator::intLike($value) === false) {
            throw new InvalidArgumentException(
                Message::ATTRIBUTE_INVALID_VALUE->getMessage(
                    (string) $value,
                    Attribute::MAXLENGTH->value,
                    'value >= 0',
                ),
            );
        }

        return $this->addAttribute(Attribute::MAXLENGTH, $value);
    }
}
