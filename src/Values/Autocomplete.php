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
     * `off` - Browser is not permitted to automatically enter or select a value for this field.
     */
    case OFF = 'off';

    /**
     * `on` - Browser is permitted to automatically complete values for this field.
     */
    case ON = 'on';
}
