<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `type` attribute.
 *
 * Defines a curated set of `type` tokens as enum cases for use with elements that support a finite set of values (for
 * example, input, button, script, and ol). Some elements interpret `type` as a MIME type (for example, link, embed,
 * object, and source), which is not an exhaustive token set.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring `type` attribute assignment.
 * - Enum values map to `type` tokens as `string` values.
 * - Suitable for rendering HTML attributes in view helpers and components.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/type
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Type: string
{
    /**
     * `button` — Push button type for `<input>` and `<button>` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#type
     */
    case BUTTON = 'button';

    /**
     * `checkbox` — Check box input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/checkbox
     */
    case CHECKBOX = 'checkbox';

    /**
     * `color` — Color picker input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/color
     */
    case COLOR = 'color';

    /**
     * `date` — Date input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/date
     */
    case DATE = 'date';

    /**
     * `datetime-local` — Date and time input control without a time zone (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/datetime-local
     */
    case DATETIME_LOCAL = 'datetime-local';

    /**
     * `1` — Decimal numbering for `<ol>` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/ol#type
     */
    case DECIMAL = '1';

    /**
     * `email` — Email address input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/email
     */
    case EMAIL = 'email';

    /**
     * `file` — File selection input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/file
     */
    case FILE = 'file';

    /**
     * `hidden` — Hidden input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/hidden
     */
    case HIDDEN = 'hidden';

    /**
     * `image` — Graphical submit button (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/image
     */
    case IMAGE = 'image';

    /**
     * `importmap` — Indicates that the script body contains an import map (`<script>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/script/type/importmap
     */
    case IMPORTMAP = 'importmap';

    /**
     * `a` — Lowercase letter numbering for `<ol>` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/ol#type
     */
    case LOWER_ALPHA = 'a';

    /**
     * `i` — Lowercase Roman numeral numbering for `<ol>` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/ol#type
     */
    case LOWER_ROMAN = 'i';

    /**
     * `module` — Treats the script as a JavaScript module (`<script>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/script/type
     */
    case MODULE = 'module';

    /**
     * `month` — Month and year input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/month
     */
    case MONTH = 'month';

    /**
     * `number` — Numeric input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/number
     */
    case NUMBER = 'number';

    /**
     * `password` — Password input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/password
     */
    case PASSWORD = 'password';

    /**
     * `radio` — Radio button input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/radio
     */
    case RADIO = 'radio';

    /**
     * `range` — Slider control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/range
     */
    case RANGE = 'range';

    /**
     * `reset` — Resets the form to its initial values (`<input>` and `<button>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#type
     */
    case RESET = 'reset';

    /**
     * `search` — Search input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/search
     */
    case SEARCH = 'search';

    /**
     * `speculationrules` — Indicates that the script body contains speculation rules (`<script>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/script/type/speculationrules
     */
    case SPECULATIONRULES = 'speculationrules';

    /**
     * `submit` — Submits the form (`<input>` and `<button>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#type
     */
    case SUBMIT = 'submit';

    /**
     * `tel` — Telephone number input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/tel
     */
    case TEL = 'tel';

    /**
     * `text` — Single-line text input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/text
     */
    case TEXT = 'text';

    /**
     * `text/css` — CSS MIME type used by `<style>` and other elements that interpret `type` as a MIME type.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/style#type
     */
    case TEXT_CSS = 'text/css';

    /**
     * `text/javascript` — JavaScript MIME type used by `<script>` and other elements that interpret `type` as a MIME type.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/script/type
     */
    case TEXT_JAVASCRIPT = 'text/javascript';

    /**
     * `time` — Time input control without a time zone (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/time
     */
    case TIME = 'time';

    /**
     * `A` — Uppercase letter numbering for `<ol>` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/ol#type
     */
    case UPPER_ALPHA = 'A';

    /**
     * `I` — Uppercase Roman numeral numbering for `<ol>` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/ol#type
     */
    case UPPER_ROMAN = 'I';

    /**
     * `url` — URL input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/url
     */
    case URL = 'url';

    /**
     * `week` — Week input control (`<input>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/week
     */
    case WEEK = 'week';
}
