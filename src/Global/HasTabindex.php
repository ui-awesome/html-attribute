<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Exception\Message;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the global HTML `tabindex` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `tabindex` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of element tab order and value validation.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `tabindex` global attribute.
 * - Immutable method for setting or overriding the `tabindex` attribute.
 * - Supports int, string, and `null` for flexible tab order assignment.
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/tabindex
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasTabindex
{
    /**
     * Sets the HTML `tabindex` attribute for the element.
     *
     * Creates a new instance with the specified tab order, supporting both explicit and nullable assignment according
     * to the HTML specification for global attributes.
     *
     * @param int|string|null $value Tab order to set for the element. Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the value is not a valid integer or string representation of an
     * `value >= -1`.
     * @return static New instance with the updated `tabindex` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/interaction.html#attr-tabindex
     *
     * Usage example:
     * ```php
     * $element->tabIndex(3);
     * ```
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
