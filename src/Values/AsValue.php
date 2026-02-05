<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `as` attribute used with preload link types.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum AsValue: string
{
    /**
     * `audio` — Applies to `<audio>` elements.
     */
    case AUDIO = 'audio';

    /**
     * `document` — Applies to `<iframe>` and `<frame>` elements.
     */
    case DOCUMENT = 'document';

    /**
     * `embed` — Applies to `<embed>` elements.
     */
    case EMBED = 'embed';

    /**
     * `fetch` — Applies to fetch, XHR requests.
     *
     * Note: This value also requires the `crossorigin` attribute for CORS-enabled fetches.
     */
    case FETCH = 'fetch';

    /**
     * `font` — Applies to CSS @font-face.
     *
     * Note: This value also requires the `crossorigin` attribute for CORS-enabled fetches.
     */
    case FONT = 'font';

    /**
     * `image` — Applies to `<img>` and `<picture>` elements with srcset or imageset attributes,
     * SVG `<image>` elements, CSS `*-image` rules.
     */
    case IMAGE = 'image';

    /**
     * `object` — Applies to `<object>` elements.
     */
    case OBJECT = 'object';

    /**
     * `script` — Applies to `<script>` elements, Worker `importScripts`.
     */
    case SCRIPT = 'script';

    /**
     * `style` — Applies to `<link rel=stylesheet>` elements, CSS `@import`.
     */
    case STYLE = 'style';

    /**
     * `track` — Applies to `<track>` elements.
     */
    case TRACK = 'track';

    /**
     * `video` — Applies to `<video>` elements.
     */
    case VIDEO = 'video';

    /**
     * `worker` — Applies to Worker, SharedWorker.
     */
    case WORKER = 'worker';
}
