<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `target` attribute.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#target
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
