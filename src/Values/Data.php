<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents `data-*` attribute property names without the `data-` prefix.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/data-*
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Data: string
{
    /**
     * Action data property (`action`).
     *
     * Specifies an action to be performed, often used in JavaScript event delegation.
     */
    case ACTION = 'data-action';

    /**
     * Confirm data property (`confirm`).
     *
     * Used to trigger confirmation dialogs before an action is executed.
     */
    case CONFIRM = 'data-confirm';

    /**
     * Content data property (`content`).
     *
     * Stores arbitrary content or templates associated with the element.
     */
    case CONTENT = 'data-content';

    /**
     * Dismiss data property (`dismiss`).
     *
     * Indicates that the element dismisses or closes a parent component (for example, modals, alerts).
     */
    case DISMISS = 'data-dismiss';

    /**
     * Id data property (`id`).
     *
     * Used to identify a specific record or entity ID associated with the element.
     */
    case ID = 'data-id';

    /**
     * Key data property (`key`).
     *
     * Defines an input key or identifier, often used in dynamic lists.
     */
    case KEY = 'data-key';

    /**
     * Method data property (`method`).
     *
     * Specifies the HTTP method to be used for a request (for example, simulating DELETE/PUT links).
     */
    case METHOD = 'data-method';

    /**
     * Name data property (`name`).
     *
     * Defines the name of a field or property associated with the element.
     */
    case NAME = 'data-name';

    /**
     * Parent data property (`parent`).
     *
     * References a parent element ID or selector.
     */
    case PARENT = 'data-parent';

    /**
     * Placement data property (`placement`).
     *
     * Specifies the placement or position of a UI element (for example, tooltips, popovers).
     */
    case PLACEMENT = 'data-placement';

    /**
     * Target data property (`target`).
     *
     * Defines a target element selector for an action (for example, collapse target, modal target).
     */
    case TARGET = 'data-target';

    /**
     * Toggle data property (`toggle`).
     *
     * Indicates a UI state toggle, widely used for dropdowns, modals, and tabs.
     */
    case TOGGLE = 'data-toggle';

    /**
     * Trigger data property (`trigger`).
     *
     * Defines the type of event or trigger mechanism (for example, hover, click, focus).
     */
    case TRIGGER = 'data-trigger';

    /**
     * Url data property (`url`).
     *
     * Defines a URL or endpoint associated with the element, often for AJAX requests.
     */
    case URL = 'data-url';

    /**
     * Value data property (`value`).
     *
     * Stores a raw value or payload associated with the element.
     */
    case VALUE = 'data-value';
}
