<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `autocorrect` global attribute.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/autocorrect
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Autocorrect: string
{
    /**
     * Represents the `off` token. Disables automatic correction of editable text.
     */
    case OFF = 'off';

    /**
     * Represents the `on` token. Enables automatic correction of spelling and punctuation errors.
     */
    case ON = 'on';
}
