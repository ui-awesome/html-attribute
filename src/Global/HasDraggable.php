<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Draggable, GlobalAttribute};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

use function is_bool;

/**
 * Trait for managing the global HTML `draggable` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `draggable` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of element drag behavior and value validation.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `draggable` global attribute.
 * - Immutable method for setting or overriding the `draggable` attribute.
 * - Supports bool, string, Draggable, and `null` for flexible drag assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/draggable
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDraggable
{
    /**
     * Sets the HTML `draggable` attribute for the element.
     *
     * Creates a new instance with the specified draggable, supporting both explicit and nullable assignment according
     * to the HTML specification for global attributes.
     *
     * While the method accepts any UnitEnum for flexibility, runtime validation ensures only values matching
     * {@see Draggable::cases()} (`false`, `true`) are accepted.
     *
     * This allows users to provide custom enums while rejecting values that are not present in the allowed token set.
     *
     * @param bool|string|UnitEnum|null $value Draggable to set for the element. Can be `null` to unset
     * the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `draggable` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/interaction.html#attr-draggable
     * {@see Draggable} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->draggable(false);
     * $element->draggable(Draggable::TRUE);
     * ```
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
