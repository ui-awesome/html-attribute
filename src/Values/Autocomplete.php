<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `autocomplete` attribute.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/autocomplete
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Autocomplete: string
{
    /**
     * Permitted to automatically enter or select a value for this field by the browser.
     */
    case OFF = 'off';

    /**
     * Allowed to automatically complete values for this field by the browser.
     */
    case ON = 'on';
}
