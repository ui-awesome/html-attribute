<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `as` attribute used with `rel="preload"` and `rel="modulepreload"` on `<link>`
 * elements.
 *
 * Defines the supported `as` tokens as enum cases. The `as` attribute specifies the type of content being loaded, which
 * is necessary for request matching, application of correct content security policy, and setting of correct `Accept`
 * request header.
 *
 * Key features.
 * - Enum values map to content type tokens as `string` values.
 * - Helps with request prioritization and CSP.
 * - Used with preload and modulepreload link types.
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
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case AUDIO = 'audio';

    /**
     * `document` — Applies to `<iframe>` and `<frame>` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case DOCUMENT = 'document';

    /**
     * `embed` — Applies to `<embed>` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case EMBED = 'embed';

    /**
     * `fetch` — Applies to fetch, XHR requests.
     *
     * Note: This value also requires the `crossorigin` attribute for CORS-enabled fetches.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case FETCH = 'fetch';

    /**
     * `font` — Applies to CSS @font-face.
     *
     * Note: This value also requires the `crossorigin` attribute for CORS-enabled fetches.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case FONT = 'font';

    /**
     * `image` — Applies to `<img>` and `<picture>` elements with srcset or imageset attributes,
     * SVG `<image>` elements, CSS `*-image` rules.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case IMAGE = 'image';

    /**
     * `object` — Applies to `<object>` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case OBJECT = 'object';

    /**
     * `script` — Applies to `<script>` elements, Worker `importScripts`.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case SCRIPT = 'script';

    /**
     * `style` — Applies to `<link rel=stylesheet>` elements, CSS `@import`.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case STYLE = 'style';

    /**
     * `track` — Applies to `<track>` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case TRACK = 'track';

    /**
     * `video` — Applies to `<video>` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case VIDEO = 'video';

    /**
     * `worker` — Applies to Worker, SharedWorker.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case WORKER = 'worker';
}
