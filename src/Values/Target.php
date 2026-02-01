<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `target` attribute on `<a>`, `<area>`, `<base>`, and `<form>` elements.
 *
 * Defines supported browsing context tokens as enum cases for use with elements that navigate or open linked resources.
 *
 * Key features.
 * - Designed for use in anchor, area, base, form, and link elements that support the `target` attribute.
 * - Enum values map to browsing context names as `string` values.
 * - Suitable for rendering HTML attributes in view helpers and components.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#target
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Target: string
{
    /**
     * `_blank` — Load the resource into a new, unnamed browsing context (typically a new tab or window).
     *
     * For security reasons, links with `target="_blank"` should use `rel="noopener noreferrer"` to prevent tabnabbing
     * attacks.
     */
    case BLANK = '_blank';

    /**
     * `_parent` — Load the resource into the parent browsing context of the current document.
     *
     * If there is no parent context, behaves the same as `_self`.
     */
    case PARENT = '_parent';

    /**
     * `_self` — Load the resource into the same browsing context as the current document.
     *
     * This is the default behavior if no target is specified.
     */
    case SELF = '_self';

    /**
     * `_top` — Load the resource into the top-level browsing context (the full, original window).
     *
     * Useful for breaking out of nested framesets. If there is no parent context, behaves the same as `_self`.
     */
    case TOP = '_top';
}
