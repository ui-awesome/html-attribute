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
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/draggable
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDraggable
{
    /**
     * Sets the HTML `draggable` attribute for the element.
     *
     * Creates a new instance with the specified draggable value.
     *
     * Controls whether the element can be dragged as part of HTML5 Drag and Drop API operations.
     * - Use `true` to make the element draggable, allowing users to drag it to drop zones.
     * - Use `false` to explicitly prevent dragging.
     *
     * This enables building drag-and-drop interfaces for reordering lists, uploading files, or moving items between
     * containers.
     *
     * @param bool|string|UnitEnum|null $value Draggable state to set for the element. Use `true` to enable dragging,
     * `false` to disable.
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
     * $element->draggable(true);
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
