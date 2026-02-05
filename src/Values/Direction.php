<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `dir` global attribute.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/dir
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Direction: string
{
    /**
     * Let the user agent decide.
     *
     * It uses a basic algorithm as it parses the characters inside the element to determine the directionality.
     *
     * usually based on the first character with strong directionality.
     */
    case AUTO = 'auto';

    /**
     * Left-to-right text direction.
     *
     * Used for languages that are written from the left to the right (for example, English, Spanish, French).
     */
    case LTR = 'ltr';

    /**
     * Right-to-left text direction.
     *
     * Used for languages that are written from the right to the left (for example, Arabic, Hebrew, Persian).
     */
    case RTL = 'rtl';
}
