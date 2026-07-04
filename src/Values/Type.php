<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `type` attribute.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/type
 */
enum Type: string
{
    /**
     * `button` — Push button type for `<input>` and `<button>` elements.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#type
     */
    case BUTTON = 'button';

    /**
     * `checkbox` — Check box input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/checkbox
     */
    case CHECKBOX = 'checkbox';

    /**
     * `color` — Color picker input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/color
     */
    case COLOR = 'color';

    /**
     * `date` — Date input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/date
     */
    case DATE = 'date';

    /**
     * `datetime-local` — Date and time input control without a time zone (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/datetime-local
     */
    case DATETIME_LOCAL = 'datetime-local';

    /**
     * `1` — Decimal numbering for `<ol>` elements.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/ol#type
     */
    case DECIMAL = '1';

    /**
     * `email` — Email address input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/email
     */
    case EMAIL = 'email';

    /**
     * `file` — File selection input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/file
     */
    case FILE = 'file';

    /**
     * `hidden` — Hidden input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/hidden
     */
    case HIDDEN = 'hidden';

    /**
     * `image` — Graphical submit button (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/image
     */
    case IMAGE = 'image';

    /**
     * `importmap` — Indicates that the script body contains an import map (`<script>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/script/type/importmap
     */
    case IMPORTMAP = 'importmap';

    /**
     * `a` — Lowercase letter numbering for `<ol>` elements.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/ol#type
     */
    case LOWER_ALPHA = 'a';

    /**
     * `i` — Lowercase Roman numeral numbering for `<ol>` elements.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/ol#type
     */
    case LOWER_ROMAN = 'i';

    /**
     * `module` — Treats the script as a JavaScript module (`<script>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/script/type
     */
    case MODULE = 'module';

    /**
     * `month` — Month and year input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/month
     */
    case MONTH = 'month';

    /**
     * `number` — Numeric input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/number
     */
    case NUMBER = 'number';

    /**
     * `password` — Password input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/password
     */
    case PASSWORD = 'password';

    /**
     * `radio` — Radio button input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/radio
     */
    case RADIO = 'radio';

    /**
     * `range` — Slider control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/range
     */
    case RANGE = 'range';

    /**
     * `reset` — Resets the form to its initial values (`<input>` and `<button>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#type
     */
    case RESET = 'reset';

    /**
     * `search` — Search input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/search
     */
    case SEARCH = 'search';

    /**
     * `speculationrules` — Indicates that the script body contains speculation rules (`<script>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/script/type/speculationrules
     */
    case SPECULATIONRULES = 'speculationrules';

    /**
     * `submit` — Submits the form (`<input>` and `<button>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#type
     */
    case SUBMIT = 'submit';

    /**
     * `tel` — Telephone number input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/tel
     */
    case TEL = 'tel';

    /**
     * `text` — Single-line text input control (`<input>`).
     *
     * @see @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Guides/MIME_types#text
     */
    case TEXT = 'text';

    /**
     * `text/css` — CSS MIME type used by `<style>` and other elements that interpret `type` as a MIME type.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Guides/MIME_types#text
     */
    case TEXT_CSS = 'text/css';

    /**
     * `text/html` — HTML MIME type used by elements that interpret `type` as a MIME type.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Guides/MIME_types#text
     */
    case TEXT_HTML = 'text/html';

    /**
     * `text/javascript` — JavaScript MIME type used by `<script>` and other elements that interpret `type` as a MIME
     * type.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Guides/MIME_types#text
     */
    case TEXT_JAVASCRIPT = 'text/javascript';

    /**
     * `time` — Time input control without a time zone (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/time
     */
    case TIME = 'time';

    /**
     * `A` — Uppercase letter numbering for `<ol>` elements.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/ol#type
     */
    case UPPER_ALPHA = 'A';

    /**
     * `I` — Uppercase Roman numeral numbering for `<ol>` elements.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/ol#type
     */
    case UPPER_ROMAN = 'I';

    /**
     * `url` — URL input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/url
     */
    case URL = 'url';

    /**
     * `week` — Week input control (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/week
     */
    case WEEK = 'week';
}
