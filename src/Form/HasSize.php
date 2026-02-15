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
 * Provides an immutable API for the `size` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Sets the `size` attribute.
     *
     * @param int|string|Stringable|UnitEnum|null $value Size value. Must be `>= 0`, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if the value is not an integer-like value `>= 0`.
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

        return $this->setAttribute(Attribute::SIZE, $value);
    }
}
