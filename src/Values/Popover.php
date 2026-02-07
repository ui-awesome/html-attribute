<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `popover` global attribute.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/popover
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Popover: string
{
    /**
     * `auto` — Element is a popover with "auto" behavior.
     *
     * Popover can be "light dismissed" (e.g. by clicking outside the popover area), and only one such popover can be
     * open at a time.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/popover#auto
     */
    case AUTO = 'auto';

    /**
     * `hint` — Element is a popover with "hint" behavior.
     *
     * Popover can be "light dismissed" (for example, by clicking outside the popover area), and multiple such popovers
     * can be open at a time.
     *
     * Note: Limited browser support. Currently supported in Chromium-based browsers only (Chrome 133+, Edge 133+,
     * Opera 118+). Not supported in Firefox or Safari.
     *
     * `@link` https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/popover#hint
     */
    case HINT = 'hint';

    /**
     * `manual` — Element is a popover with "manual" behavior.
     *
     * Popover cannot be "light dismissed", and multiple such popovers can be open at a time.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/popover#manual
     */
    case MANUAL = 'manual';
}
