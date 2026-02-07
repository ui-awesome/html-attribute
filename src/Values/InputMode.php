<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `inputmode` attribute.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/inputmode
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum InputMode: string
{
    /**
     * `decimal` - Fractional numeric input keyboard containing the digits and decimal separator.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/inputmode#decimal
     */
    case DECIMAL = 'decimal';

    /**
     * `email` - Virtual keyboard optimized for entering email addresses.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/inputmode#email
     */
    case EMAIL = 'email';

    /**
     * `none` - No virtual keyboard.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/inputmode#none
     */
    case NONE = 'none';

    /**
     * `numeric` - Numeric input keyboard, but only requires the digits 0–9.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/inputmode#numeric
     */
    case NUMERIC = 'numeric';

    /**
     * `search` - Virtual keyboard optimized for search input.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/inputmode#search
     */
    case SEARCH = 'search';

    /**
     * `tel` - Telephone keypad input, including the digits 0–9, the asterisk (*), and the pound (#) key.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/inputmode#tel
     */
    case TEL = 'tel';

    /**
     * `text` - Standard text input keyboard.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/inputmode#text
     */
    case TEXT = 'text';

    /**
     * `url` - Virtual keyboard optimized for entering URLs.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/inputmode#url
     */
    case URL = 'url';
}
