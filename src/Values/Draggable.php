<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `draggable` global attribute.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/draggable
 */
enum Draggable: string
{
    /**
     * Indicates that the element is not draggable (`false`).
     *
     * The element cannot be dragged by the user.
     */
    case FALSE = 'false';

    /**
     * Indicates that the element is explicitly draggable (`true`).
     *
     * The element can be dragged by the user.
     */
    case TRUE = 'true';
}
