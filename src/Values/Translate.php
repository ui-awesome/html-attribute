<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `translate` global attribute.
 *
 * Defines the supported translate tokens as enum cases.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring translate assignment.
 * - Enum values are represented as `string` tokens.
 * - Enum values map to `no` and `yes`.
 * - Integration-ready for tag rendering and element generation APIs.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/translate
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Translate: string
{
    /**
     * Indicates that the element is not translatable (`no`).
     *
     * Indicates that the element should not be translated by translation tools.
     */
    case NO = 'no';

    /**
     * Indicates that the element is explicitly translatable (`yes`).
     *
     * Indicates that the element should be translated by translation tools.
     */
    case YES = 'yes';
}
