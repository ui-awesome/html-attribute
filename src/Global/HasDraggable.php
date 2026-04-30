<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Draggable, GlobalAttribute};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

use function is_bool;

/**
 * Provides an immutable API for the `draggable` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/draggable
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDraggable
{
    /**
     * Sets the `draggable` attribute.
     *
     * Usage example:
     * ```php
     * $element->draggable(true);
     * $element->draggable(Draggable::TRUE);
     * ```
     *
     * @param bool|string|UnitEnum|null $value Draggable state. Use `true` or `false`, or `null` to remove the
     * attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `draggable` attribute.
     *
     * {@see Draggable} for predefined enum values.
     */
    public function draggable(bool|string|UnitEnum|null $value): static
    {
        if (is_bool($value)) {
            $value = $value ? 'true' : 'false';
        }

        Validator::oneOf($value, Draggable::cases(), GlobalAttribute::DRAGGABLE);

        return $this->addAttribute(GlobalAttribute::DRAGGABLE, $value);
    }
}
