<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents standardized values for the HTML `crossorigin` attribute.
 *
 * Provides a type-safe set of CORS (Cross-Origin Resource Sharing) policy tokens and concise documentation aligned with
 * the MDN reference and the CORS specification.
 *
 * Key features.
 * - Designed for use in media elements (img, video, audio), script, link, and SVG elements.
 * - Suitable for rendering HTML attributes in view helpers and components.
 * - Values follow the CORS tokens listed in the MDN documentation.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/crossorigin
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Crossorigin: string
{
    /**
     * `anonymous` - CORS requests for this element will have the credentials flag set to 'same-origin'.
     *
     * This is the default value when the attribute is present without a value. When not specified, the resource is
     * fetched without a CORS request (i.e., without sending the Origin HTTP header).
     *
     * @link https://html.spec.whatwg.org/multipage/urls-and-fetching.html#cors-settings-attributes
     */
    case ANONYMOUS = 'anonymous';

    /**
     * `use-credentials` - CORS requests for this element will have the credentials flag set to 'include'.
     *
     * This value will include credentials (cookies, authorization headers, or TLS client certificates) in CORS
     * requests.
     *
     * @link https://html.spec.whatwg.org/multipage/urls-and-fetching.html#cors-settings-attributes
     */
    case USE_CREDENTIALS = 'use-credentials';
}
