<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents the `popovertargetaction` attribute values.
 *
 * Usage example:
 * ```php
 * $button->popovertargetaction(PopoverTargetAction::TOGGLE);
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#popovertargetaction
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum PopoverTargetAction: string
{
    /**
     * `hide` — Hides the popover.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#hide
     */
    case HIDE = 'hide';

    /**
     * `show` — Shows the popover.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#show
     */
    case SHOW = 'show';

    /**
     * `toggle` — Toggles the visibility of the popover.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#toggle
     */
    case TOGGLE = 'toggle';
}
