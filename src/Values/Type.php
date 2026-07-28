<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents the control types of the HTML `<input>` element, shared with `<button>` for the form-submission types.
 *
 * Elements that read `type` as an open MIME hint, such as `<a>`, `<link>`, `<script>`, `<source>`, and `<style>`, take
 * a plain `string` instead.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input#input_types
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
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/text
     */
    case TEXT = 'text';

    /**
     * `time` — Time input control without a time zone (`<input>`).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/time
     */
    case TIME = 'time';

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
