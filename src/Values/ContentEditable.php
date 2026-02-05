<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `contenteditable` global attribute.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/contenteditable
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum ContentEditable: string
{
    /**
     * Indicates that the element is not editable (`false`).
     *
     * Element's contents cannot be modified by the user.
     */
    case FALSE = 'false';

    /**
     * Indicates that the element is editable as plain text only (`plaintext-only`).
     *
     * Only plain text editing is allowed; no rich text formatting is permitted.
     */
    case PLAINTEXT_ONLY = 'plaintext-only';

    /**
     * Indicates that the element is editable (`true`).
     *
     * Element's contents can be modified by the user, including rich text formatting.
     */
    case TRUE = 'true';
}
