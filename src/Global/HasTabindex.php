<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Exception\Message;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;

/**
 * Provides an immutable API for the `tabindex` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/tabindex
 */
trait HasTabindex
{
    /**
     * Sets the `tabindex` attribute.
     *
     * Usage example:
     * ```php
     * $element->tabIndex(0);
     * $element->tabIndex(-1);
     * $element->tabIndex(1);
     * ```
     *
     * @param int|string|null $value Tab order value as an integer or string of '-1' or greater, or `null` to remove
     * the attribute.
     *
     * @throws InvalidArgumentException if the value is not a valid integer or string representation of '-1' or greater.
     * @return static New instance with the updated `tabindex` attribute.
     */
    public function tabIndex(int|string|null $value): static
    {
        if ($value !== -1 && $value !== '-1' && $value !== null && Validator::intLike($value) === false) {
            throw new InvalidArgumentException(
                Message::ATTRIBUTE_INVALID_VALUE->getMessage($value, GlobalAttribute::TABINDEX->value, 'value >= -1'),
            );
        }

        return $this->addAttribute(GlobalAttribute::TABINDEX, $value);
    }
}
