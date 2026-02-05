<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML/SVG `decoding` attribute.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/decoding
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Decoding: string
{
    /**
     * Decode the image asynchronously, after rendering and presenting the other content (`async`).
     *
     * The browser will render and present other content first, then decode the image and present it later.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/decoding#async
     */
    case ASYNC = 'async';

    /**
     * No preference for the decoding mode (`auto`).
     *
     * The browser decides what is best for the user. This is the default value.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/decoding#auto
     */
    case AUTO = 'auto';

    /**
     * Decode the image synchronously along with rendering the other content (`sync`).
     *
     * The browser will decode the image along with rendering other content and present everything together.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/decoding#sync
     */
    case SYNC = 'sync';
}
