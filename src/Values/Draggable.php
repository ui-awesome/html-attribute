<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `draggable` global attribute.
 *
 * Defines the supported draggable tokens as enum cases.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring draggable assignment.
 * - Enum values are represented as `string` tokens.
 * - Enum values map to `false` and `true`.
 * - Integration-ready for tag rendering and element generation APIs.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/draggable
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
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
