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
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#popovertargetaction
 */
enum PopoverTargetAction: string
{
    /**
     * `hide` — Hides the popover.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#hide
     */
    case HIDE = 'hide';

    /**
     * `show` — Shows the popover.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#show
     */
    case SHOW = 'show';

    /**
     * `toggle` — Toggles the visibility of the popover.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#toggle
     */
    case TOGGLE = 'toggle';
}
