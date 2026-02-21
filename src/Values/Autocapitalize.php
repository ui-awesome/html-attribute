<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `autocapitalize` global attribute.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/autocapitalize
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Autocapitalize: string
{
    /**
     * Represents the `characters` token. Automatically capitalizes every character.
     */
    case CHARACTERS = 'characters';

    /**
     * Represents the `none` token. Does not automatically capitalize any text.
     */
    case NONE = 'none';

    /**
     * Represents the `off` token. Alias for `none`.
     */
    case OFF = 'off';

    /**
     * Represents the `on` token. Alias for `sentences`.
     */
    case ON = 'on';

    /**
     * Represents the `sentences` token. Automatically capitalizes the first character of each sentence.
     */
    case SENTENCES = 'sentences';

    /**
     * Represents the `words` token. Automatically capitalizes the first character of each word.
     */
    case WORDS = 'words';
}
